/**
 * Created by issam on 16/06/19.
 */


// google auto complete
options = {
    types: ['(cities)']
    //componentRestrictions: { country: ['MA','FR']}
};

var input1 = document.getElementById('user_localisation');
autocomplete1 = new google.maps.places.Autocomplete(input1,options);


