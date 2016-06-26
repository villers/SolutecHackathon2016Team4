const SERVICES = new Map();

class Achievements {
  constructor($state, usersService) {
    SERVICES
      .set('$state', $state)
      .set('usersService', usersService);

    this.achievements = [];
    SERVICES.get('usersService').me().then((result) => {
      this.achievements = result.data.achievements;
    });
  }
}

Achievements.$inject = ['$state', 'usersService'];

export default Achievements;
