window.onload = function(){
			var imageAd = document.querySelectorAll('#ad>img');
			var circle = document.querySelectorAll('#circle>li');
			var arrowLeft = document.querySelector('#arrow-left');
			var arrowRight = document.querySelector('#arrow-right');


			/*自动切换*/
			var currentIndex = 0;
			var timer;
			timer = setInterval(changeImage,4000);
			function changeImage(){
				imageAd[currentIndex].className = 'leftOut';
				circle[currentIndex].className = '';

				currentIndex ++;
				if (currentIndex >= circle.length) {
					currentIndex = 0;
				}
				imageAd[currentIndex].className = 'rightIn';
				circle[currentIndex].className = 'active';
			}

			function setClear(){
				clearInterval(timer);
				timer = setInterval(changeImage,4000);
			}

			/*点击箭头切换*/
			arrowLeft.onclick = function(){
				imageAd[currentIndex].className = 'leftOut';
				circle[currentIndex].className = '';

				currentIndex ++;
				if (currentIndex >= circle.length) {
					currentIndex = 0;
				}
				imageAd[currentIndex].className = 'rightIn';
				circle[currentIndex].className = 'active';
				setClear();

				// clearInterval(timer);
				// timer = setInterval(changeImage,4000);
			}
			arrowRight.onclick = function(){
				imageAd[currentIndex].className = 'rightOut';
				circle[currentIndex].className = '';

				currentIndex --;
				if (currentIndex < 0) {
					currentIndex = circle.length - 1;
				}
				imageAd[currentIndex].className = 'leftIn';
				circle[currentIndex].className = 'active';

				setClear();

				// clearInterval(timer);
				// timer = setInterval(changeImage,4000);
			}

			/*手动切换*/
			for(var i = 0; i < circle.length;i++){
				circle[i].onclick = function(){

					var activeNav = document.querySelector('#circle .active');
					activeNav.className= '';
					this.className = 'active';


					var index = switchs(this);
					var activeIndex = switchs(activeNav);


					if (index > activeIndex) {
						imageAd[activeIndex].className = 'leftOut';
						imageAd[index].className = 'rightIn';
					}
					if(index < activeIndex){
						imageAd[activeIndex].className = 'rightOut';
						imageAd[index].className = 'leftIn';
					}

					// clearInterval(timer);
					// timer = setInterval(changeImage,4000);
					setClear();


				}
			}

			function switchs(menuItem){
				var index = -1;
				for(var i = 0;i < circle.length;i++){
					if (circle[i] == menuItem) {
						index = i;
						break;
					}
				}
				return index;
			}

		}
		