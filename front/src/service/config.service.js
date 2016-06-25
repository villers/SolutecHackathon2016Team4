import CONF from '../constant/config';

const CONFIG = new Map();

class ConfigService {
  constructor() {
    Object
        .keys(CONF)
        .map(key => CONFIG.set(key, CONF[key]));
  }

  /**
   * Get config value by key
   * @param {String} key
   * @returns {String}
   */
  get(key) {
    return CONFIG.get(key);
  }

  /**
   * Internal logger
   * @param message
   * @returns {ConfigService}
   */
  logger(...message) {
    if (this.get('DEBUG')) {
      console.log(...message);
    }

    return this;
  }

  /**
   * Factory of this class
   * @returns {ConfigService}
   */
  static factory() {
    return new ConfigService();
  }
}

ConfigService.factory.$inject = [];

export default ConfigService;
