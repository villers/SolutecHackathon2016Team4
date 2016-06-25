const SERVICES = new Map();

class Login {
  constructor($state, $auth, $mdToast) {
    SERVICES
      .set('$state', $state)
      .set('$auth', $auth)
      .set('$mdToast', $mdToast);

    this.error = null;

    this.credentials = {
      email: '',
      password: '',
    };
  }

  login() {
    SERVICES.get('$auth').login(this.credentials).then(() => {
      const toast = SERVICES.get('$mdToast').simple()
        .textContent('Connecté')
        .highlightAction(true)
        .highlightClass('md-accent')
        .hideDelay(3000)
        .position('top right');

      SERVICES.get('$mdToast').show(toast);
      SERVICES.get('$state').go('dashboard', {});
    }, response => {
      this.error = response.data.error;
    });
  }
}

Login.$inject = ['$state', '$auth', '$mdToast'];

export default Login;
