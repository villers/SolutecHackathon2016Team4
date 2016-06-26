import angular from 'angular';

const SERVICES = new Map();

class Achievements {
  constructor($state, usersService, achievementsService) {
    SERVICES
      .set('$state', $state)
      .set('usersService', usersService)
      .set('achievementsService', achievementsService);

    this.achievements = [];
    SERVICES.get('achievementsService').all().then((result) => {
      this.achievements = result.data.achievements;
      SERVICES.get('usersService').me().then(me => {
        angular.forEach(this.achievements, itemTotal => {
          angular.forEach(me, item => {
            if (itemTotal.active) {
              return;
            }
            itemTotal.active = (itemTotal.id === item.id);
          });
        });
      });
    });
  }


  show(id) {
    console.log(id);
  }
}

Achievements.$inject = ['$state', 'usersService', 'achievementsService'];

export default Achievements;
