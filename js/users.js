eventListeners();
function eventListeners() {
  document
    .getElementById("users_form")
    .addEventListener("submit", validateForm);
}

function validateForm(e) {
  e.preventDefault();
  const action = document.getElementById("tipo").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  if (email === "" || password === "") {
    //Validating form
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Todos los campos son necesarios!",
    });
  } else {
    //Ajax
    const xhr = new XMLHttpRequest();

    //open the connection
    xhr.open("POST", "includes/models/users-model.php", true);

    //Creating the form data
    const usersFormData = new FormData();
    usersFormData.append("email", email);
    usersFormData.append("password", password);
    usersFormData.append("action", action);

    //onload
    xhr.onload = function () {
      if (this.status === 200) {
        const data = JSON.parse(this.responseText);
        console.log(data);
        const { answer, action, inserted_id } = data;
        if (answer === "success") {
          if (action === "signup") {
            Swal.fire({
              icon: "success",
              title: "Correcto",
              text: "Registro Hecho",
            });
            document.getElementById("users_form").reset();
          } else if (action === "login") {
            Swal.fire({
              icon: "success",
              title: "Login Correcto",
              text: "Presiona OK para abrir el dashboard",
            }).then((resultado) => {
              if (resultado.value) {
                window.location.href = "index.php";
              }
            });
          }
        }else if(answer==="Incorrect Password"){
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Contraseña Incorrecta',
            })
        }else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Usuario inexistente',
            })
        }
      }
    };

    // sending the data
    xhr.send(usersFormData);
  }
}
