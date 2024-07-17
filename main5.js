function calc(z) {
    var lati;
    var longi;
      var latlng = Object.entries(z);
      lati = latlng[0][1];
      longi = latlng[1][1];
    
      createCookie('lat',lati,1);
      createCookie('lon',longi,1);    
    
    // Function to create the cookie
    function createCookie(name, value, exdays) {
      var expires;
        const  date = new Date();
        date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    
      document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }
    }