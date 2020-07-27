(function eventListeners() {
  document
    .getElementById("components_form")
    .addEventListener("submit", addComponentFunction);
  document
    .getElementById("components-list")
    .addEventListener("click", deleteComponentFunction);
})();

//Globals
const components_list = document.querySelector("#components-list");

//#region ADDING COMPONENTS

function addComponentFunction(e) {
  e.preventDefault();
  //Getting the values form the form
  const component_name = document.getElementById("component_name").value;
  const component_desc = document.getElementById("component_desc").value;
  const component_price = document.getElementById("component_price").value;
  //Getting the computer id by the URL
  const url = location.search;
  const pc_id = url.substring(7);

  //Validating the data
  if (
    component_price === "" ||
    component_name === "" ||
    component_desc === ""
  ) {
    //Erro SweetAlert
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Todos los campos son necesarios!",
    });
  } else {
    // Creating AJAX call
    const xhr = new XMLHttpRequest();

    //Creating the form data
    const formDataComponents = new FormData();
    formDataComponents.append("component_name", component_name);
    formDataComponents.append("component_price", component_price);
    formDataComponents.append("component_desc", component_desc);
    formDataComponents.append("action", "create");
    formDataComponents.append("pc_id", pc_id);
    //Opening the reques
    xhr.open("POST", "includes/models/component-model.php", true);

    //Onload
    xhr.onload = function () {
      if (this.status === 200) {
        const result = JSON.parse(this.responseText);
        const { answer, action, inserted_id } = result;
        if (answer === "success") {
          //Inserting the new component in the dom

          //creating the div-item
          const div_component = document.createElement("div");
          div_component.classList.add("item-component");

          //creating the h4 for the name of the component
          const h4_name = document.createElement("h4");
          h4_name.innerHTML = component_name;

          //Creating paragraph to the description
          const p_desc = document.createElement("p");
          p_desc.innerHTML = component_desc;

          //creating the p label to the proce
          const p_price = document.createElement("p");
          p_price.innerHTML = component_price;
          p_price.classList.add("price");

          //Appending the data to the div
          div_component.append(h4_name);
          div_component.append(p_desc);
          div_component.append(p_price);
          //Appending the new component to tje list
          components_list.append(div_component);
          const hr = document.createElement("hr");
          components_list.append(hr);
          Swal.fire({
            icon: "success",
            title: "Correcto",
            text: "Componente Agregado!",
          });
          document.getElementById("components_form").reset();
        }
      }
    };

    //Sending the data
    xhr.send(formDataComponents);
  }
}

//#endregion adding components

//#region  DELETE COMPONENT

function deleteComponentFunction(e) {
  if (e.target.classList.contains("far", "fa-trash-alt")) {
    const div_component = e.target.parentElement;
    const component_id = div_component.id;

    Swal.fire({
      title: "¿Estás seguro?",
      text: "No podrás recuperar el componente!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, estoy seguro",
    }).then((result) => {
      //creating form data
      const formDataComponent = new FormData();
      formDataComponent.append("component_id", component_id);
      formDataComponent.append("action", "delete");

      //AJAX
      const xhr = new XMLHttpRequest();
      //opening the request
      xhr.open("POST", "includes/models/component-model.php", true);
      //onload
      xhr.onload = function () {
        if (this.status === 200) {
          const result = JSON.parse(this.responseText);
          if (result.answer === "success") {
            div_component.remove();
          }
        }
      };
      //send
      xhr.send(formDataComponent);
      if (result.value) {
        Swal.fire("Borrado!", "Componente Eliminado.", "success");
      }
    });
  }
}

//#endregion delete component
