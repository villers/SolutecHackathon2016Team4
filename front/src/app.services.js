import angular from 'angular';

import ConfigService from './service/config.service';
import AchievementsService from './service/achievements.service';
import CategoriesService from './service/categories.service';
import NotificationsService from './service/notifications.service';
import UsersService from './service/users.service';
import JobsService from './service/jobs.service';

const moduleName = 'app.services';

angular
  .module(moduleName, [])
  .factory('configService', ConfigService.factory)
  .factory('achievementsService', AchievementsService.factory)
  .factory('categoriesService', CategoriesService.factory)
  .factory('notificationsService', NotificationsService.factory)
  .factory('usersService', UsersService.factory)
  .factory('jobsService', JobsService.factory)
  .factory('configService', ConfigService.factory);

export default moduleName;
