const SERVICES = new Map();

class Purposes {
  constructor($state, usersService, purposesService) {
    SERVICES
      .set('$state', $state)
      .set('usersService', usersService)
      .set('purposesService', purposesService);

    this.purposes = [];
    SERVICES.get('usersService').me().then((result) => {
      this.purposes = result.data;
      this.purposes.purposes.forEach((item) => {
        SERVICES.get('usersService').get(item.from_user_id).then((user) => {
          item.user = user.data;
        });
      });
    });
  }
}

Purposes.$inject = ['$state', 'usersService', 'purposesService'];

export default Purposes;
