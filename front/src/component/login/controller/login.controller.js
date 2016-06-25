const SERVICES = new Map();

class Login {


  constructor($state, $auth) {
    SERVICES
      .set('$state', $state)
      .set('$auth', $auth);

    this.credentials = {
      email: '',
      password: '',
    };
  }

  login() {
    SERVICES.get('$auth').login(this.credentials).then(() => {
      // If login is successful, redirect to the users state
      SERVICES.get('$state').go('home', {});
    });
  }
}

Login.$inject = ['$state', '$auth'];

export default Login;
