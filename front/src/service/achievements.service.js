const SERVICES = new Map();

class AchievementsService {
  constructor($http, configService) {
    SERVICES
      .set('$http', $http)
      .set('configService', configService);

    this.apiUrl = SERVICES.get('configService').get('API_URL');
  }

  all() {
    return SERVICES.get('$http').get(`${this.apiUrl}/achievements`);
  }

  get(id) {
    return SERVICES.get('$http').get(`${this.apiUrl}/achievements/${id}`);
  }

  create(params) {
    return SERVICES.get('$http').post(`${this.apiUrl}/achievements`, params);
  }

  update(id, params) {
    return SERVICES.get('$http').put(`${this.apiUrl}/achievements/${id}`, params);
  }

  destroy(id) {
    return SERVICES.get('$http').delete(`${this.apiUrl}/achievements/${id}`);
  }

  /**
   * Factory of this class
   * @returns {AchievementsService}
   */
  static factory($http, configService) {
    return new AchievementsService($http, configService);
  }
}

AchievementsService.factory.$inject = ['$http', 'configService'];

export default AchievementsService;
