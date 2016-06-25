const SERVICES = new Map();

class Login {
  constructor($state) {
    SERVICES.set('$state', $state);
  }
}

Login.$inject = ['$state'];

export default Login;
