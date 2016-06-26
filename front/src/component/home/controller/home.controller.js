const SERVICES = new Map();

class NetflixHome {
  constructor($state, usersService, configService) {
    SERVICES
      .set('$state', $state)
      .set('usersService', usersService)
      .set('configService', configService);

    this.users = [];
    this.api_url = SERVICES.get('configService').get('API_URL');
    this.pdfUrl = '/pdf/relativity.pdf';

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

        this.users = res.data.users;
      });
  }
}

NetflixHome.$inject = ['$state', 'usersService', 'configService'];

export default NetflixHome;
