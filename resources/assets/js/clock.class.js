class Clock {

  constructor() {
    moment.locale('en-gb');
    this.displayClock();
  }

  displayClock() {
    var _this = this;
    this.updateClock();
    setInterval(function () {
      _this.updateClock();
    }, 1000);
  }

  updateClock() {
    $('#clock').html(moment().format('H.mm A'));
  }

}

(function () {
  new Clock();
})();