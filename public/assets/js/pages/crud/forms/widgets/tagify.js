// Class definition
var KTTagifyDemos = function() {
    // Private functions
   
    var amenities = function() {
        // Init autocompletes
        var toEl = document.getElementById('amenities_tag');
        var tagifyTo = new Tagify(toEl, {
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: [
                {
                value : 'Maintenance Staff',
                class : 'tagify__tag--primary'
            }, {
                value : 'Roof Terrace',
            }, {
                value : 'Video Security',
            },{
                value : 'Roof Terrace',
            },{
                value : 'Water Storage',
            },{
                value : 'Power Backup',
            },{
                value : 'Air Conditioning',
            },{
                value : 'Balcony',
            },{
                value : 'Cot',
            },{
                value : 'Rain Water Harvesting',
            },{
                value : 'Gym',
            }],
            templates: {
                dropdownItem : function(tagData){
                    try {
                        var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <div class="d-flex flex-column">';
                        html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">'+ (tagData.value ? tagData.value : '') + '</a>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';

                        return html;
                    } catch (err) {}
                }
            },
            transformTag: function(tagData) {
                tagData.class = 'tagify__tag tagify__tag--primary';
            },
            dropdown : {
                classname : "color-blue",
                enabled   : 1,
                maxItems  : 20
            }
        });
    }

    var updateAmenities = function() {
        // Init autocompletes
        var toEl = document.getElementById('update_amenities_tag');
        var tagifyTo = new Tagify(toEl, {
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: [
                {
                value : 'Maintenance Staff',
                class : 'tagify__tag--primary'
            }, {
                value : 'Roof Terrace',
            }, {
                value : 'Video Security',
            }],
            templates: {
                dropdownItem : function(tagData){
                    try {
                        var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <div class="d-flex flex-column">';
                        html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">'+ (tagData.value ? tagData.value : '') + '</a>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';

                        return html;
                    } catch (err) {}
                }
            },
            transformTag: function(tagData) {
                tagData.class = 'tagify__tag tagify__tag--primary';
            },
            dropdown : {
                classname : "color-blue",
                enabled   : 1,
                maxItems  : 20
            }
        });
    }

    var misc = function() {
        // Init autocompletes
        var toEl = document.getElementById('misc_tag');
        var tagifyTo = new Tagify(toEl, {
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: [
                {
                value : 'City view',
                class : 'tagify__tag--primary'
            }, {
                value : 'Cooling features: Air Conditioning Unit(s)',
            }, {
                value : 'Master Bedroom',
            }, {
                value : 'Golf course view',
            }, {
                value : 'Existing Structures: Guest House',
            }, {
                value : 'Parking features: Circular',
            }, {
                value : 'Swimming pool(s)',
            }, {
                value : 'Pool features: Indoor Pool',
            }],
            templates: {
                dropdownItem : function(tagData){
                    try {
                        var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <div class="d-flex flex-column">';
                        html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">'+ (tagData.value ? tagData.value : '') + '</a>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';

                        return html;
                    } catch (err) {}
                }
            },
            transformTag: function(tagData) {
                tagData.class = 'tagify__tag tagify__tag--primary';
            },
            dropdown : {
                classname : "color-blue",
                enabled   : 1,
                maxItems  : 20
            }
        });
    }

    var updateMisc = function() {
        // Init autocompletes
        var toEl = document.getElementById('update_misc_tag');
        var tagifyTo = new Tagify(toEl, {
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: [
                {
                value : 'City view',
                class : 'tagify__tag--primary'
            }, {
                value : 'Cooling features: Air Conditioning Unit(s)',
            }, {
                value : 'Master Bedroom',
            }, {
                value : 'Golf course view',
            }, {
                value : 'Existing Structures: Guest House',
            }, {
                value : 'Parking features: Circular',
            }, {
                value : 'Swimming pool(s)',
            }, {
                value : 'Pool features: Indoor Pool',
            }],
            templates: {
                dropdownItem : function(tagData){
                    try {
                        var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <div class="d-flex flex-column">';
                        html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">'+ (tagData.value ? tagData.value : '') + '</a>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';

                        return html;
                    } catch (err) {}
                }
            },
            transformTag: function(tagData) {
                tagData.class = 'tagify__tag tagify__tag--primary';
            },
            dropdown : {
                classname : "color-blue",
                enabled   : 1,
                maxItems  : 20
            }
        });
    }
  
    return {
        // public functions
        init: function() {
            amenities();
            misc();
            updateAmenities();
            updateMisc();
        }
    };
}();

jQuery(document).ready(function() {
    KTTagifyDemos.init();
});
