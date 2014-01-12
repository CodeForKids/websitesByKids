/*Don't touch this please!*/
var keys = document.querySelectorAll('#calculator span');
var operators = ['+', '-', 'x', '÷'];
var decimalAdded = false;


for(var i = 0; i < keys.length; i++) {
	keys[i].onclick = function(e) {
		var input = document.querySelector('.screen');
		/*********
			Enter your code here!
		*********/
		var inputVal = input.innerHTML;
		var btnVal = this.innerHTML;
		
		

		
		
		 if(btnVal == '=') {
		
			/* Don't touch this stuff!*/
			var equation = inputVal;
			var lastChar = equation[equation.length - 1];
			equation = equation.replace(/x/g, '*').replace(/÷/g, '/');
			if(operators.indexOf(lastChar) > -1 || lastChar == '.')
				equation = equation.replace(/.$/, '');

			/*********
				Enter your code for calculating here!
			*********/
			inputVal = equation;
			if(equation){
				input.innerHTML = eval(inputVal);
			}
			
			
			
			
			
			decimalAdded = false;
		}
		
		else if(btnVal == 'C') {
		/*********
			Enter the code to clear the screen here!
		*********/
			input.innerHTML = '';
		
		
		}
	 
	 /*Don't touch anything below this line! */
	 
		else if(operators.indexOf(btnVal) > -1) {
			// Operator is clicked
			// Get the last character from the equation
			var lastChar = inputVal[inputVal.length - 1];
			
			// Only add operator if input is not empty and there is no operator at the last
			if(inputVal != '' && operators.indexOf(lastChar) == -1) 
				input.innerHTML += btnVal;
			
			// Allow minus if the string is empty
			else if(inputVal == '' && btnVal == '-') 
				input.innerHTML += btnVal;
			
			// Replace the last operator (if exists) with the newly pressed operator
			if(operators.indexOf(lastChar) > -1 && inputVal.length > 1) {
				// Here, '.' matches any character while $ denotes the end of string, so anything (will be an operator in this case) at the end of string will get replaced by new operator
				input.innerHTML = inputVal.replace(/.$/, btnVal);
			}
			
			decimalAdded =false;
		}
		
		// Now only the decimal problem is left. We can solve it easily using a flag 'decimalAdded' which we'll set once the decimal is added and prevent more decimals to be added once it's set. It will be reset when an operator, eval or clear key is pressed.
		else if(btnVal == '.') {
			if(!decimalAdded) {
				input.innerHTML += btnVal;
				decimalAdded = true;
			}
		}
		else {
			input.innerHTML += btnVal;
		}
		
		// prevent page jumps
		e.preventDefault();
	} 
}