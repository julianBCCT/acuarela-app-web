class FormValidator {
  constructor(form, fields, handleResponse) {
    this.form = form;
    this.fields = fields;
    this.handleResponse = handleResponse;
  }

  initialize() {
    this.validateOnEntry();
    this.validateOnSubmit();
  }

  validateOnSubmit() {
    let self = this;

    this.form.addEventListener("submit", (e) => {
      e.preventDefault();
      let isValid = true;
      self.fields.forEach((field) => {
        const input = document.querySelector(`#${field}`);
        if (!self.validateFields(input)) {
          isValid = false;
        }
      });

      if (isValid) {
        // If all fields are valid, submit the form via AJAX
        self.ajaxSubmit();
      }
    });
  }

  ajaxSubmit() {
    fadeIn(preloader);
    // Serialize form data
    const formData = new FormData(this.form);

    // Make AJAX request
    fetch(this.form.action, {
      method: this.form.method,
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        this.handleResponse(data); // Handle response data using the provided function
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }

  validateOnEntry() {
    let self = this;
    this.fields.forEach((field) => {
      const input = document.querySelector(`#${field}`);

      input.addEventListener("input", (event) => {
        self.validateFields(input);
      });
    });
  }

  validateFields(field) {
    // Check presence of values
    if (field.value.trim() === "") {
      this.setStatus(
        field,
        `${
          field.previousElementSibling
            ? field.previousElementSibling.innerText
            : field.placeholder
        } es obligatorio`,
        "error"
      );
      return false;
    } else {
      this.setStatus(field, null, "success");
    }

    // check for a valid email address
    if (field.type === "email") {
      const re = /\S+@\S+\.\S+/;
      if (re.test(field.value)) {
        this.setStatus(field, null, "success");
      } else {
        this.setStatus(
          field,
          "Por favor ingresa un correo electrónico válido",
          "error"
        );
        return false;
      }
    }

    // Password confirmation edge case
    if (field.id === "password_confirmation") {
      const passwordField = this.form.querySelector("#password");

      if (field.value.trim() == "") {
        this.setStatus(
          field,
          "Se requiere confirmación de contraseña",
          "error"
        );
        return false;
      } else if (field.value != passwordField.value) {
        this.setStatus(field, "La contraseña no coincide", "error");
        return false;
      } else {
        this.setStatus(field, null, "success");
      }
    }

    return true;
  }

  setStatus(field, message, status) {
    const errorMessage = field.parentElement.querySelector(".error-message");

    if (status === "success") {
      if (errorMessage) {
        errorMessage.innerText = "";
      }
      field.classList.remove("input-error");
    }

    if (status === "error") {
      field.parentElement.querySelector(".error-message").innerText = message;
      field.classList.add("input-error");
    }
  }
}
const createAsistenteForm = document.querySelector("#createAsistente");
if (createAsistenteForm) {
  const createAsistenteFormFields = [
    "nombres",
    "apellidos",
    "email",
    "fecha-de-nacimiento",
    "telefono",
    "calle",
    "depto-unidad",
    "codigo-postal",
    "estado",
    "ciudad",
  ];
  // Función de manejo de respuesta dinámica Login
  async function handleResponse(data) {
    let { id, lastname, mail, name, phone } = data.entity;
    let requestOptions = {
      method: "GET",
    };
    const baseLink = `https://acuarelacore.com/asistentes/register/${id}/${name}/${lastname}/${mail}/${phone}`;
    const emailAsistentes = await fetch(
      `https://bilingualchildcaretraining.com/s/emailAsistentes/?name=${`${name} ${lastname}`}&daycare=${daycareName}&email=${mail}&link=${baseLink}`,
      requestOptions
    )
      .then((response) => response.json())
      .then((result) => {
        fadeOut(preloader);
      })
      .catch((error) => console.log("error", error));
    window.location.href = "/miembros/acuarela-app-web/asistentes";
  }
  const validator = new FormValidator(
    createAsistenteForm,
    createAsistenteFormFields,
    handleResponse
  );

  validator.initialize();
}
const editAsistenteForm = document.querySelector("#editAsistente");
if (editAsistenteForm) {
  const editAsistenteFormFields = [
    "nombres",
    "apellidos",
    "fecha-de-nacimiento",
    "telefono",
    "calle",
    "depto-unidad",
    "codigo-postal",
    "estado",
    "ciudad",
  ];
  // Función de manejo de respuesta dinámica Login
  async function handleResponse(data) {
    fadeOut(preloader);
    // window.location.reload();
  }
  const validator = new FormValidator(
    editAsistenteForm,
    editAsistenteFormFields,
    handleResponse
  );

  validator.initialize();
}

const createGroup = document.querySelector("#createGroup");
if (createGroup) {
  const createGroupFields = ["acuarelauser", "edades", "shift"];
  // Función de manejo de respuesta dinámica Login
  function handleResponse(data) {
    fadeOut(preloader);
    window.location.href = "/miembros/acuarela-app-web/grupos";
  }
  const validator = new FormValidator(
    createGroup,
    createGroupFields,
    handleResponse
  );

  validator.initialize();
}

const editGroup = document.querySelector("#editGroup");
if (editGroup) {
  const editGroupFields = ["acuarelauser", "edades", "shift"];
  // Función de manejo de respuesta dinámica Login
  function handleResponse(data) {
    console.log(data);
    fadeOut(preloader);
    window.location.href = `/miembros/acuarela-app-web/grupo/${
      document.querySelector("main").dataset.groupid
    }`;
  }
  const validator = new FormValidator(
    editGroup,
    editGroupFields,
    handleResponse
  );

  validator.initialize();
}

const Comment = document.querySelector("#add-comment");
if (Comment) {
  const CommentFields = ["acuarelauser"];

  // Función de manejo de respuesta dinámica Login
  function handleResponse(data) {
    fadeOut(preloader);
    window.location.href = "/miembros/acuarela-app-web/grupos";
  }
  const validator = new FormValidator(Comment, CommentFields, handleResponse);

  validator.initialize();
}
