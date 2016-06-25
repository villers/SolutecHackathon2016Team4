class SampleDirective {
  constructor() {
    this.restrict = 'A';
    this.template = '<div></div>';
  }

  /**
   * Factory of this class
   * @returns {SampleDirective}
   */
  static factory() {
    SampleDirective.instance = new SampleDirective();
    return SampleDirective.instance;
  }
}

SampleDirective.factory.$inject = [];

export default SampleDirective;
