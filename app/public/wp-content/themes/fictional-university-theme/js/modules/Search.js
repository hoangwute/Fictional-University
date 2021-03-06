import $ from 'jquery';

class Search {
	//1. describe and create/initialize our object
	constructor() {
		this.resultsDiv = $("#search-overlay__results");
		this.openButton = $(".js-search-trigger");
		this.closeButton = $(".search-overlay__close");
		this.searchOverlay = $(".search-overlay");
		this.searchField = $("#search-term");
		this.events();
		this.isOverlayOpen = false;
		this.isSpinnerVisible = false;
		this.previousValue;
		this.typingTimer;
	}

	//2. events
	events() {
		this.openButton.on("click", this.openOverlay.bind(this));
		this.closeButton.on("click", this.closeOverlay.bind(this));
		$(document).on("keydown", this.keyPressDispatcher.bind(this));
		this.searchField.on("keyup", this.typingLogic.bind(this));
	}

	//3. methods
	openOverlay() {
		this.searchOverlay.addClass("search-overlay--active");
		$("body").addClass("body-no-scroll"); //no scroll when overlay has been popped
		this.isOverlayOpen = true;
	}

	closeOverlay() {
		this.searchOverlay.removeClass("search-overlay--active");
		$("body").removeClass("body-no-scroll"); //scrollable again
		this.isOverlayOpen = false;
	}

	keyPressDispatcher(e) {
		if (e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) { //press S to open overlay
			this.openOverlay();
			console.log("Open overlay");
		} 
		if (e.keyCode == 27 && this.isOverlayOpen) { //press ESC to close overlay
			this.closeOverlay();
			console.log("Close overlay");
		}
	}

	typingLogic() {
		if(this.searchField.val() != this.previousValue) {
			clearTimeout(this.typingTimer);
			if (this.searchField.val()) { 
				if (!this.isSpinnerVisible) { //make spinner not reloaded everytime new keyword is entered
					this.resultsDiv.html('<div class="spinner-loader"></div>');
					this.isSpinnerVisible = true;
				}
				this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
			} else { //reset results if search field is blank
				this.resultsDiv.html('');
				this.isSpinnerVisible = false;
			}

		}
		this.previousValue = this.searchField.val();
	}

	getResults() {
		$.getJSON('http://localhost:3000/wp-json/wp/v2/posts?search=' + this.searchField.val(), posts => {
			var testArray = ['red', 'orange', 'blue'];
			this.resultsDiv.html(`
				<h2 class="search-overlay__section-title">General Information</h2>
				<ul class="link-list min-list">
					${posts.map(item => `<li><a href="${item.title.link}">${item.title.rendered}</a></li>`).join('')}
				</ul>
				`);
		});
	}
}

export default Search;