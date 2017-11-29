/* CSE326 : Web Application Development
 * Lab 10 - Maze Assignment
 *
 */
"use strict";

var loser = null;  // whether the user has hit a wall

window.onload = function() {
	var bound = $$(".boundary");
	for(var i = 0 ; i<bound.length-1 ; i++){
		bound[i].observe("mouseover", overBoundary);
	}

	var end = $('end');
	end.observe("mouseover", overEnd);

	var start = $('start');
	start.observe("click", startClick);

	var maze = $('maze');
	maze.observe("mouseleave", overBody);
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
	if(loser != true && loser != false){
		loser = true;
		var bound = $$('.boundary');
		for(var i = 0 ; i<bound.length-1 ; i++){
			bound[i].addClassName("youlose");
		}
		$('status').innerHTML= "you lose!! :(";
	}
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	loser = null;
	alert("start!");
	var bound = $$('.boundary');
	for(var i = 0 ; i<bound.length-1 ; i++){
		bound[i].removeClassName("youlose");
	}
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	if(loser == null){
		$('status').innerHTML= "you win!! :)";
		loser = false;
	}
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	if(loser != false){
		loser = true;

		var bound = $$('.boundary');
		for(var i = 0 ; i<bound.length-1 ; i++){
			bound[i].addClassName("youlose");
		}
		$('status').innerHTML= "you lose!! :(";
	}
}
