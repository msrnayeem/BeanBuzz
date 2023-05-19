document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submission

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the callback function for handling the AJAX response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var response = xhr.responseText;
      
            // console.log("Response:", response); // Log the response for debugging
      
            try {
              var jsonResponse = JSON.parse(response);
              // Process the JSON response
              if (jsonResponse.status === 'success') {
              
                console.log(jsonResponse.Email);
                console.log(jsonResponse.Name);
              //  window.location.replace('../View/dashboard.php');
              } else {
                console.log("Error:", jsonResponse);
                document.getElementById('error').innerHTML = jsonResponse.message;
              }
            } catch (error) {
              console.log("Error parsing JSON:", error);
            }
          } else {
            document.getElementById('error').innerHTML = 'An error occurred during login. Please try again.';
          }
        }
      };
      
   
    // Prepare and send the AJAX request
    xhr.open('POST', '../Controller/loginCheck.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
});