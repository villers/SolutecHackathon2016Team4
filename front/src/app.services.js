import angular from 'angular';

import ConfigService from './service/config.service';

const moduleName = 'app.services';

angular
    .module(moduleName, [])
    .factory('configService', ConfigService.factory);

export default moduleName;
