const SERVICES = new Map();

class NetflixHome {
  constructor($state) {
    SERVICES.set('$state', $state);
  }
}

NetflixHome.$inject = ['$state'];

export default NetflixHome;
