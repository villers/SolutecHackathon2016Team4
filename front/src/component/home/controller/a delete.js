import template from '../template/vote.html';
import angular from 'angular';

const SERVICES = new Map();

class NetflixHome {
  constructor($state, usersService, configService, purposesService, notificationsService, $rootScope, $mdDialog) {
    SERVICES
      .set('$state', $state)
      .set('usersService', usersService)
      .set('configService', configService)
      .set('purposesService', purposesService)
      .set('notificationsService', notificationsService)
      .set('$mdDialog', $mdDialog);

    this.id = $rootScope.currentUser.id;

    this.users = [];
    this.api_url = SERVICES.get('configService').get('API_URL');
    this.rating1 = 5;
    this.rating2 = 2;
    this.isReadonly = true;
    this.rateFunction = rating => console.log('Rating selected', rating);


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

  showPrompt(ev, userID) {
    console.log(SERVICES.get('$mdDialog'));
    const confirm = SERVICES.get('$mdDialog')
      .prompt()
      .title('Qu\'avez vous à dire')
      .textContent('Soyez constructif')
      .placeholder('Commentaire')
      .ariaLabel('Dog name')
      .targetEvent(ev)
      .ok('J\'envoie')
      .cancel('J\'annule');

    SERVICES.get('$mdDialog').show(confirm).then(result => {
      this.status = `You decided to name your ${result}`;
      console.log(result);
      console.log(this.id);
      console.log(userID);

      SERVICES.get('purposesService').create({ from_user_id: this.id, to_user_id: userID, message: result });
      SERVICES.get('notificationsService').create({ user_id: userID, has_read: 0, message: 'Vous avez un nouveau commentaire sur votre CV' });
    }, () => {
      this.status = 'You didn\'t name your dog.';
    });
  }


  showAdvanced(ev) {
    SERVICES.get('$mdDialog').show({
      controller: () => {
        // Some code ..
      },
      template,
      parent: angular.element(document.body),
      targetEvent: ev,
      clickOutsideToClose: true,
      fullscreen: false,
    })
      .then(answer => {
        this.status = answer;
      }, () => {
        this.status = 'You cancelled the dialog.';
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

NetflixHome.$inject = [
  '$state', 'usersService', 'configService', 'purposesService', 'notificationsService', '$rootScope', '$mdDialog', '$mdMedia',
];

export default NetflixHome;
