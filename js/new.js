var InputMask = {
    init: function (value) {
        var text = "readonly";
        text = concat(text,value);
        alert(text);
        var divMask = document.getElementById(text);
        var inputField = document.getElementById("myInput");
        InputMask._input = inputField;
        InputMask._pos = 0;
        // resets the form
        inputField.value = "";
        
        divMask.addEventListener('click', InputMask.focusHandler, false );
        inputField.addEventListener('focus', InputMask.focusHandler, false );
        inputField.addEventListener('keydown', InputMask.keyInput, false );
        
    },
    
    focusHandler: function(event){
        InputMask._input.focus();
        
        var backup = InputMask._input.value.substr(20) || "";
        
        InputMask._input.value="                    " + backup;
    },
    
    keyInput: function ( event ) {
        var length_invalid = (InputMask._input.value.length == 20 ) ? true : false;
        var realString = InputMask._input.value.substr(20);
        var realLength = realString.length;
        
        // fix to mouse selection delete
        if ( InputMask._input.value.length < 20 ) {
            InputMask._input.value="                    ";
        }
        
        // backspace code = 8
        if (event.keyCode == 8 && length_invalid ) event.preventDefault();
        
        // left arrow key = 37
        if ( event.keyCode == 37 && (realLength + InputMask._pos) == 0 ) {
            event.preventDefault();
        } else if (event.keyCode == 37 && ( InputMask._pos >= (0 - realLength))) {
            InputMask._pos--;
        }
        
        // right arrow key = 39
        if ( event.keyCode == 39 && InputMask._pos < 0) InputMask._pos++;        
        
        // enter = 13
        if ( event.keyCode == 13) {
            alert ( "Input Value: ["+ InputMask._input.value.substr(20) +"]");
            
            // reset
            InputMask.reset();
        }
    },
    reset: function(){
        var field = InputMask._input;
        
        field.value = "";
        field.blur();
    }
};

// InputMask.init();