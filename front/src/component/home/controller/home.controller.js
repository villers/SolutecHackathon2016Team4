const SERVICES = new Map();

class NetflixHome {
  constructor($state, usersService) {
    SERVICES
      .set('$state', $state)
      .set('usersService', usersService);

    this.users = [];

    SERVICES
      .get('usersService')
      .all()
      .then(res => {
        this.users = res.data;
        console.log(this.users);
      });
  }
}

NetflixHome.$inject = ['$state', 'usersService'];

export default NetflixHome;
