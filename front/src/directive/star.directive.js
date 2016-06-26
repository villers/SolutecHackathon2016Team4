class StarRating {
  constructor() {
    this.restrict = 'EA';
    this.template = `
    <ul class="star-rating" ng-class="{readonly: readonly}">
      <li ng-repeat="star in stars" class="star" ng-class="{filled: star.filled}" ng-click="toggle($index)">
        D
      </li>'
    </ul>`;

    this.scope = {
      ratingValue: '=ngModel',
      max: '=?', // optional (default is 5)
      onRatingSelect: '&?',
      readonly: '=?',
    };
  }

  link(scope) {
    if (scope.max === undefined) {
      scope.max = 5;
    }

    const updateStars = () => {
      scope.stars = [];
      for (let i = 0; i < scope.max; i++) {
        scope.stars.push({
          filled: i < scope.ratingValue,
        });
      }
    };

    scope.toggle = index => {
      if (scope.readonly === undefined || scope.readonly === false) {
        scope.ratingValue = index + 1;
        scope.onRatingSelect({ rating: index + 1 });
      }
    };

    scope.$watch('ratingValue', (oldValue, newValue) => {
      if (newValue) {
        updateStars();
      }
    });
  }

  /**
   * Factory of this class
   * @returns {SampleDirective}
   */
  static factory() {
    StarRating.instance = new StarRating();
    return StarRating.instance;
  }
}

StarRating.factory.$inject = [];

export default StarRating;
