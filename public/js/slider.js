angular.module('website', ['ngAnimate', 'ngTouch'])
    .controller('MainCtrl', function ($scope) {
        $scope.slides = [
            {image: 'img/fotoshoot1.jpg', description: 'Fotoshoot 1', width: 300, height: 500},
            {image: 'img/fotoshoot2.jpg', description: 'Fotoshoot 2', width: 300, height: 500},
            {image: 'img/fotoshoot3.jpg', description: 'Fotoshoot 3', width: 300, height: 500},
            {image: 'img/fotoshoot4.jpg', description: 'Fotoshoot 4', width: 300, height: 500},
            {image: 'img/fotoshoot5.jpg', description: 'Fotoshoot 5', width: 300, height: 500},
            {image: 'img/fotoshoot6.jpg', description: 'Fotoshoot 6', width: 300, height: 500},
            {image: 'img/fotoshoot7.png', description: 'Fotoshoot 7', width: 300, height: 500},
            {image: 'img/fotoshoot8.jpg', description: 'Fotoshoot 8', width: 300, height: 500},
            {image: 'img/fotoshoot9.jpg', description: 'Fotoshoot 9', width: 300, height: 500}
        ];

        $scope.direction = 'left';
        $scope.currentIndex = 0;

        $scope.setCurrentSlideIndex = function (index) {
            $scope.direction = (index > $scope.currentIndex) ? 'left' : 'right';
            $scope.currentIndex = index;
        };

        $scope.isCurrentSlideIndex = function (index) {
            return $scope.currentIndex === index;
        };

        $scope.prevSlide = function () {
            $scope.direction = 'left';
            $scope.currentIndex = ($scope.currentIndex < $scope.slides.length - 1) ? ++$scope.currentIndex : 0;
        };

        $scope.nextSlide = function () {
            $scope.direction = 'right';
            $scope.currentIndex = ($scope.currentIndex > 0) ? --$scope.currentIndex : $scope.slides.length - 1;
        };
    })
    .animation('.slide-animation', function () {
        return {
            beforeAddClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    var finishPoint = element.parent().width();
                    if(scope.direction !== 'right') {
                        finishPoint = -finishPoint;
                    }
                    TweenMax.to(element, 0.5, {left: finishPoint, onComplete: done });
                }
                else {
                    done();
                }
            },
            removeClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    element.removeClass('ng-hide');

                    var startPoint = element.parent().width();
                    if(scope.direction === 'right') {
                        startPoint = -startPoint;
                    }

                    TweenMax.fromTo(element, 0.5, { left: startPoint }, {left: 0, onComplete: done });
                }
                else {
                    done();
                }
            }
        };
    });

