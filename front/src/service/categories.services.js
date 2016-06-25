const SERVICES = new Map();

class CategoriesService {
  constructor($http, configService) {
    SERVICES
      .set('$http', $http)
      .set('configService', configService);

    this.apiUrl = SERVICES.get('configService').get('API_URL');
  }

  all() {
    return SERVICES.get('$http').get(`${this.apiUrl}/categories`);
  }

  get(id) {
    return SERVICES.get('$http').get(`${this.apiUrl}/categories/${id}`);
  }

  create(params) {
    return SERVICES.get('$http').post(`${this.apiUrl}/categories/${id}`, params);
  }

  update(id) {
    return SERVICES.get('$http').put(`${this.apiUrl}/categories/${id}`);
  }

  destroy(id) {
    return SERVICES.get('$http').delete(`${this.apiUrl}/categories/${id}`);
  }

  /**
   * Factory of this class
   * @returns {CategoriesService}
   */
  static factory($http, configService) {
    return new CategoriesService($http, configService);
  }
}

CategoriesService.factory.$inject = ['$http', 'configService'];

export default CategoriesService;
