const SERVICES = new Map();

class Login {
  constructor($state, $auth, store, $mdToast, $rootScope) {
    SERVICES
      .set('$state', $state)
      .set('$auth', $auth)
      .set('store', store)
      .set('$mdToast', $mdToast)
      .set('$rootScope', $rootScope);

    this.error = null;

    this.credentials = {
      email: '',
      password: '',
    };
  }

  login() {
    SERVICES.get('$auth').login(this.credentials).then((response) => {
      const toast = SERVICES.get('$mdToast').simple()
        .textContent('Connecté')
        .highlightAction(true)
        .highlightClass('md-accent')
        .hideDelay(3000)
        .position('bottom right');

      SERVICES.get('$rootScope').currentUser = response.data;
      SERVICES.get('store').set('currentUser', response.data);

      SERVICES.get('$mdToast').show(toast);
      SERVICES.get('$state').go('dashboard', {});
    }, response => {
      this.error = response.data.error;
    });
  }
}

Login.$inject = ['$state', '$auth', 'store', '$mdToast', '$rootScope'];

export default Login;
