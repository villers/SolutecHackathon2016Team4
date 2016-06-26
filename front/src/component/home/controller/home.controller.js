const SERVICES = new Map();

class NetflixHome {
  constructor($state, usersService, configService, $rootScope) {
    SERVICES
      .set('$state', $state)
      .set('usersService', usersService)
      .set('configService', configService);

    this.id = $rootScope.currentUser.id;
    this.users = [];
    this.api_url = SERVICES.get('configService').get('API_URL');

    SERVICES
      .get('usersService')
      .all()
      .then(res => {
        res.data.users.forEach(x => {
          if (x.picture === '') {
            x.picture = 'http://www.petzoned.com/assets/default_avatar-468e8f42276a2fd234b034f28536570b.png';
          } else {
            x.picture = `${this.api_url}/avatar/${x.picture}`;
          }
        });

        this.selectedId(res.data.users[0].id);
        this.users = res.data.users;
      });
  }

  selectedId(id) {
    this.selected = id;
  }

  getPdf() {
    return `${this.api_url}/download?id=${this.selected}`;
  }

  getHeight() {
    return `${window.screen.availHeight - 100}px`;
  }
}

NetflixHome.$inject = ['$state', 'usersService', 'configService', '$rootScope'];

export default NetflixHome;
