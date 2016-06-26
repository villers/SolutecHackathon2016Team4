import angular from 'angular';

const SERVICES = new Map();

class Profil {
  constructor($state, usersService, $mdToast, configService) {
    SERVICES
      .set('$state', $state)
      .set('$mdToast', $mdToast)
      .set('usersService', usersService)
      .set('configService', configService);

    this.countries = [];
    this.file = {};
    this.api = null;
    this.types = ['candidate', 'recruiter'];

    this.credentialsUpdate = {
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

    this.api_url = SERVICES.get('configService').get('API_URL');

    this.sync();
  }

  update() {
    SERVICES.get('usersService')
      .update(this.credentialsUpdate.id, this.credentialsUpdate)
      .then(result => {
        this.sync();

        const toast = SERVICES.get('$mdToast').simple()
          .textContent(result.data.message)
          .highlightAction(true)
          .highlightClass('md-accent')
          .hideDelay(3000)
          .position('bottom right');

        SERVICES.get('$mdToast').show(toast);
      });
  }

  upload() {
    console.log(this.file);
    const formData = new FormData();
    formData.append('file', this.file[0].lfFile);
    formData.append('id', this.credentialsUpdate.id);

    SERVICES.get('usersService').upload(formData, {
      transformRequest: angular.identity,
      headers: { 'Content-Type': undefined },
    }).then(() => {
      this.api.removeAll();
      this.sync();

      const toast = SERVICES.get('$mdToast').simple()
        .textContent('Photos de profil bien ajoutée')
        .highlightAction(true)
        .highlightClass('md-accent')
        .hideDelay(3000)
        .position('bottom right');

      SERVICES.get('$mdToast').show(toast);
    }, err => {
      console.log(err);
    });
  }

  sync() {
    SERVICES.get('usersService').me().then((result) => {
      this.credentialsUpdate = result.data;
    });

    SERVICES.get('usersService').country().then(countries => {
      this.countries = countries.data;
    });
  }
}

Profil.$inject = ['$state', 'usersService', '$mdToast', 'configService'];

export default Profil;
