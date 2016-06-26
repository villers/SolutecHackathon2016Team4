const SERVICES = new Map();

class Toolbar {
  constructor($state, $auth) {
    SERVICES.set('$state', $state);
    SERVICES.set('$auth', $auth);

    this.isAuthenticated = () => $auth.isAuthenticated();
  }
}

Toolbar.$inject = ['$state', '$auth'];

export default Toolbar;
