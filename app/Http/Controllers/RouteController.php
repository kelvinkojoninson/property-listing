<?php

namespace App\Http\Controllers;

// use App\Models\Applicants;

use App\Models\Agents;
use App\Models\Bookings;
use App\Models\BuildingTypes;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\Customers;
use App\Models\OwnerAgents;
use App\Models\Properties;
use App\Models\States;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    private $building_types;
    private $cities;
    private $featured;
    private $propertyTypes;
    private $contractTypes;
    private $locations;
    private $latest;
    private $portfolios;
    private $states;
    private $propertyByPlaces;
    private $popular;

    public function __construct()
    {
        // $this->middleware("auth");
        // $this->middleware('verified');

        $this->building_types = BuildingTypes::withCount('properties')->where('deleted', 0)->get();
        $this->cities = Cities::where('deleted', 0)->get();
        $this->featured = Properties::where('deleted', 0)
            ->where('featured', 0)
            ->whereIn('status', ['rent', 'sale'])
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $this->popular = Properties::where('deleted', 0)
            ->where('popular', 0)
            ->whereIn('status', ['rent', 'sale'])
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $this->propertyTypes = Properties::where('deleted', 0)
            ->whereIn('status', ['rent', 'sale'])
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $this->propertyByPlaces = Properties::with('cityDesc')
            ->select('city', 'pictures', DB::raw('count(*) as total'))
            ->where('state', 7)
            ->inRandomOrder()
            ->limit(8)
            ->groupBy('city', 'pictures')
            ->get();

        $this->contractTypes = Properties::where('deleted', 0)
            ->whereIn('status', ['rent', 'sale'])
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $this->locations = Properties::where('deleted', 0)
            ->whereIn('status', ['rent', 'sale'])
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $this->latest = Properties::where('deleted', 0)
            ->whereIn('status', ['rent', 'sale'])
            ->inRandomOrder()
            ->orderByDesc('createdate')
            ->limit(4)
            ->get();

        $this->portfolios = Properties::where('deleted', 0)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $this->states = States::where('deleted', 0)
            ->orderBy('name', 'asc')
            ->get();
            
    }

    public function dashboard()
    {
        $target = "admin.dashboard.index";
        $tenants = '';
        $properties = '';
        $balance = '';

        if (Auth::user()->role === 'tenant') {
            $target = "admin.rents.index";
            $tenants = User::where('deleted', 0)->where('role', 'tenant')->get();
            $properties = Properties::where('deleted', 0)->where('ownership_status', 0)->get();
            Wallet::firstOrCreate([
                'userid' => Auth::user()->userid,
            ], [
                'wallet_id' => "WA" . strtoupper(bin2hex(random_bytes(5))),
                'userid' => Auth::user()->userid,
            ]);
            $balance = WalletHistory::where('userid', Auth::user()->userid)->sum('amount');
        }

        return view($target, [
            "tenants" => $tenants,
            "properties" => $properties,
            "balance" => $balance,
        ]);
        
    }

    public function applicants()
    {
        return view("admin.applicants.index", [
            // "permissions" => $this->permissions('customers'),
        ]);
    }

    public function posts()
    {
        return view("admin.posts.index", [
            // "permissions" => $this->permissions('customers'),
        ]);
    }

    public function education()
    {
        return view("admin.education.index", [
            // "permissions" => $this->permissions('customers'),
        ]);
    }

    public function buildingTypes()
    {
        return view("admin.building_types.index", [
            // "permissions" => $this->permissions('customers'),
        ]);
    }

    public function payments()
    {
        $users = User::where('deleted', 0)->where('role', 'tenant')->get();
        $properties = Properties::where('deleted', 0)->get();

        return view("admin.payments.index", [
            "users" => $users,
            "properties" => $properties,
        ]);
    }

    public function properties()
    {
        $countries = Countries::with('states')->where('deleted', 0)->get();
        $states = States::with('cities')->where('deleted', 0)->get();
        $building_types = BuildingTypes::where('deleted', 0)->get();

        return view("admin.properties.index", [
            "countries" => $countries,
            "states" => $states,
            "buildingTypes" => $building_types,
        ]);
    }

    public function transfers()
    {
        $users = User::where('deleted', 0)->where('role', 'user')->get();
        $properties = Properties::where('ownership_status', 0)->where('deleted', 0)->get();
        return view("admin.transfers.index", [
            "users" => $users,
            "properties" => $properties,
        ]);
    }

    public function appointments()
    {
        $users = User::where('deleted', 0)->get();
        return view("admin.appointments.index", [
            "users" => $users,
        ]);
    }

    public function account()
    {
        return view("auth.account", [
            // "permissions" => $this->permissions('customers'),
        ]);
    }

    public function password()
    {
        return view("auth.password", [
            // "permissions" => $this->permissions('customers'),
        ]);
    }

    public function propertyGrid($buildingType, $location, $contractType)
    {
        $properties = Properties::when($buildingType !== 'all', function ($q)  use ($buildingType) {
            return $q->where('building_type', $buildingType);
        })->when($location !== 'all', function ($q)  use ($location) {
            return $q->where('city', $location);
        })->when($contractType !== 'all', function ($q)  use ($contractType) {
            return $q->where('status', $contractType);
        })->where('deleted', 0)->paginate(9);

        $propertiesCount = Properties::when($buildingType !== 'all', function ($q)  use ($buildingType) {
            return $q->where('building_type', $buildingType);
        })->when($location !== 'all', function ($q)  use ($location) {
            return $q->where('city', $location);
        })->when($contractType !== 'all', function ($q)  use ($contractType) {
            return $q->where('status', $contractType);
        })->where('deleted', 0)->count();

        return view("properties-grid", [
            "buildingTypes" => $this->building_types,
            "cities" => $this->cities,
            "propertyTypes" => $this->propertyTypes,
            "contractTypes" => $this->contractTypes,
            "locations" => $this->locations,
            "latest" => $this->latest,
            "portfolios" => $this->portfolios,
            "properties" => $properties,
            "propertiesCount" => $propertiesCount,
            "states" => $this->states,
        ]);
    }

    public function propertyList($buildingType, $location, $contractType)
    {
        $this->propertyGrid($buildingType, $location, $contractType);
    }

    public function propertyDetails($propertyID)
    {
        $property = Properties::where('transid', $propertyID)->where('deleted', 0)->first();
        $similarProperties = Properties::where('transid', '!=', $propertyID)
            ->where('state', $property->state)
            ->where('deleted', 0)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        if (Auth::user()) {
            $checkIfBooked = Bookings::where('userid', Auth::user()->userid)
                ->where('status', 1)
                ->where('property_id', $property->transid)
                ->where('deleted', 0)
                ->first();
        }

        return view("property-detail", [
            "buildingTypes" => $this->building_types,
            "cities" => $this->cities,
            "propertyTypes" => $this->propertyTypes,
            "contractTypes" => $this->contractTypes,
            "locations" => $this->locations,
            "latest" => $this->latest,
            "portfolios" => $this->portfolios,
            "property" => $property,
            "states" => $this->states,
            "similarProperties" => $similarProperties,
            "checkIfBooked" => Auth::user() ? $checkIfBooked : [],
        ]);
    }

    public function dashboardMap()
    {

        return view("dashboard-map", [
            "buildingTypes" => $this->building_types,
            "cities" => $this->cities,
            "propertyTypes" => $this->propertyTypes,
            "contractTypes" => $this->contractTypes,
            "locations" => $this->locations,
            "latest" => $this->latest,
            "portfolios" => $this->portfolios,
            "states" => $this->states,
        ]);
    }

    public function portfolio($buildingType)
    {
        $portfolio = Properties::select('transid', 'title', 'pictures')
            ->when($buildingType !== 'all', function ($q)  use ($buildingType) {
                return $q->where('building_type', $buildingType);
            })->inRandomOrder()
            ->where('deleted', 0)->paginate(5);

        return view("portfolio", [
            "buildingTypes" => $this->building_types,
            "cities" => $this->cities,
            "propertyTypes" => $this->propertyTypes,
            "contractTypes" => $this->contractTypes,
            "locations" => $this->locations,
            "latest" => $this->latest,
            "portfolios" => $this->portfolios,
            "portfolio" => $portfolio,
            "states" => $this->states,
        ]);
    }

    public function portfolioDetails($propertyID)
    {
        $portfolio = Properties::where('deleted', 0)->first();

        return view("portfolio-detail", [
            "buildingTypes" => $this->building_types,
            "cities" => $this->cities,
            "propertyTypes" => $this->propertyTypes,
            "contractTypes" => $this->contractTypes,
            "locations" => $this->locations,
            "latest" => $this->latest,
            "portfolios" => $this->portfolios,
            "portfolio" => $portfolio,
            "states" => $this->states,
        ]);
    }

    public function contact()
    {
        return view("contact", [
            "buildingTypes" => $this->building_types,
            "cities" => $this->cities,
            "propertyTypes" => $this->propertyTypes,
            "contractTypes" => $this->contractTypes,
            "locations" => $this->locations,
            "latest" => $this->latest,
            "portfolios" => $this->portfolios,
            "states" => $this->states,
        ]);
    }

    public function about()
    {
        return view("about", [
            "buildingTypes" => $this->building_types,
            "cities" => $this->cities,
            "propertyTypes" => $this->propertyTypes,
            "contractTypes" => $this->contractTypes,
            "locations" => $this->locations,
            "latest" => $this->latest,
            "portfolios" => $this->portfolios,
            "states" => $this->states,
        ]);
    }

    public function welcome()
    {

        return view("welcome", [
            "buildingTypes" => $this->building_types,
            "cities" => $this->cities,
            "featured" => $this->featured,
            "popular" => $this->popular,
            "propertyTypes" => $this->propertyTypes,
            "contractTypes" => $this->contractTypes,
            "locations" => $this->locations,
            "latest" => $this->latest,
            "portfolios" => $this->portfolios,
            "states" => $this->states,
            "propertyByPlaces" => $this->propertyByPlaces,
        ]);
    }

    public function agents()
    {
        $users = User::where('deleted', 0)->where('role', 'user')->get();
        $agents = Agents::where('deleted', 0)->get();

        $properties = Properties::where('deleted', 0)
            ->where('ownership_status', 0)->get();

        return view("admin.agents.index", [
            "users" => $users,
            "agents" => $agents,
            "properties" => $properties,
        ]);
    }

    public function tenants()
    {
        $tenants = User::where('deleted', 0)->where('role', 'tenant')->get();

        $properties = Properties::where('deleted', 0)
            ->where('ownership_status', 0)->get();

        return view("admin.tenants.index", [
            "tenants" => $tenants,
            "properties" => $properties,
        ]);
    }

    public function myRents()
    {
        $tenants = User::where('deleted', 0)->where('role', 'tenant')->get();
        Wallet::firstOrCreate([
            'userid' => Auth::user()->userid,
        ], [
            'wallet_id' => "WA" . strtoupper(bin2hex(random_bytes(5))),
            'userid' => Auth::user()->userid,
        ]);
        $balance = WalletHistory::where('userid', Auth::user()->userid)->sum('amount');

        $properties = Properties::where('deleted', 0)
            ->where('ownership_status', 0)->get();

        return view("admin.rents.index", [
            "tenants" => $tenants,
            "properties" => $properties,
            "balance" => $balance,
        ]);
    }

    public function enquiries()
    {
        $agents = Agents::where('deleted', 0)->get();

        return view("admin.enquiries.index", [
            "agents" => $agents,
        ]);
    }

    public function logs()
    {
        $users = User::where('deleted', 0)->get();

        return view("admin.logs.index", [
            "users" => $users,
        ]);
    }

    public function invitations()
    {
        $users = User::where('deleted', 0)->where('role', 'user')->get();

        return view("admin.invitations.index", [
            "users" => $users,
            // "permissions" => $this->permissions('customers'),
        ]);
    }
}
