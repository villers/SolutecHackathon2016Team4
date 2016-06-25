const SERVICES = new Map();

class Register {
  constructor($state, $auth, $mdToast, usersService) {
    SERVICES
      .set('$state', $state)
      .set('$auth', $auth)
      .set('$mdToast', $mdToast)
      .set('usersService', usersService);

    this.countries = [];
    this.error = null;

    this.credentials = {
      first_name: '',
      last_name: '',
      login: '',
      email: '',
      password: '',
      password_confirmation: '',
      country: '',
      city: '',
      postal_code: '',
      address_number: '',
      address: '',
      type: '',
    };

    this.types = ['candidate', 'recruiter'];

    SERVICES.get('usersService').country().then(countries => {
      this.countries = countries.data;
    });
  }

  register() {
    SERVICES.get('$auth').signup(this.credentials).then(() => {
      const toast = SERVICES.get('$mdToast').simple()
        .textContent('Inscription réussie. Pensez à valider votre compte.')
        .highlightAction(true)
        .highlightClass('md-accent')
        .hideDelay(3000)
        .position('top right');

      SERVICES.get('$mdToast').show(toast);
      SERVICES.get('$state').go('login', {});
    }, (response) => {
      this.error = response.error;
    });
  }
}

Register.$inject = ['$state', '$auth', '$mdToast', 'usersService'];

export default Register;
