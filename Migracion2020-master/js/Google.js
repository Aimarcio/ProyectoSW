function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    // console.log('Name: ' + profile.getName());
    //console.log('Image URL: ' + profile.getImageUrl());
    // console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    $.ajax( {
        url: 'GoogleLogIn.php',
        method: 'POST',
        cache: false, 
        data: {
          email: profile.getEmail(),
          image: profile.getImageUrl()
        },
        complete: function () {
          const logged = localStorage.getItem("logged");
          if (!logged || logged === "false") {
            localStorage.setItem("logged", "true");
            location.reload();
          }
        }
    });
    
  }

  function signOut() {
    gapi.auth2.init();
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.disconnect().then(function () {
      console.log('User signed out.');
      localStorage.setItem("logged", "false");
      location.href="../php/LogOut.php";
    });
  }

