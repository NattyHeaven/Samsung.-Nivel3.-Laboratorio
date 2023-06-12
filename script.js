const validarCampos = (nombre, apellido_uno, apellido_dos, email, login, password) => {
    if (nombre === '' || apellido_uno === '' || apellido_dos === '' || email === '' || login === '' || password === '') {
      return false;
    }
    return true;
  };
  
  const validarEmail = (email) => {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (regex.test(email)) {
      return true;
    }
    return false;
  };
  
  const validarPassword = (password) => {
    if (password.length >= 4 && password.length <= 8) {
      return true;
    }
    return false;
  };
  
  const validacion = () => {
    const nombre = document.getElementById('nombre').value;
    const apellido_uno = document.getElementById('apellido_uno').value;
    const apellido_dos = document.getElementById('apellido_dos').value;
    const email = document.getElementById('email').value;
    const login = document.getElementById('login').value;
    const password = document.getElementById('password').value;
    const correcto = validarCampos(nombre, apellido_uno, apellido_dos, email, login, password);
  
    if (!validarCampos()) {
      alert('Por favor, debe rellenar todos los campos.');
      return;
    }
  
    if (!validarEmail()) {
      alert('El email no es válido.');
      return;
    }
  };
  