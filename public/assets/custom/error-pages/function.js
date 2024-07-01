const BLACKLISTED_KEY_CODES = [38,40,37,39,18,20,17,16,9,27,144];

//List of commands

    const COMMANDS = {
        "help":
            "The page you want to visit <span class=\"red\"> does not exist</span>, or it may have been deleted, or the wrong address was entered. To see the commands, enter the word <span class=\"red\"> commands</span>",
        "exit":
            "",
        "close":
            "",
        "back":
            "",
        "commands":
            "List of commands: <span class=\"red\"> help</span>, <span class=\"red\"> exit</span>, <span class=\"red\"> support</span>\n",
        "cls":
            "",
        "support":
            "🔗 Do you want to ask any question about our website? <a href=\"https://discord.gg/kitsumyuzu\"> click here</a>"
    };

    let userInput, terminalOutput, Terminal, Keyboard;

    const app = () => {

        userInput = document.getElementById("userInput");
        terminalOutput = document.getElementById("code");
        Terminal = document.getElementById("Terminal");
        Keyboard = document.getElementById("Keyboard");

        Keyboard.focus();

        if (screen.width < 991) {

            Keyboard.addEventListener("keyup", key);

        } else {

            document.addEventListener('keypress', key);

        }

        document.addEventListener("keydown", backSpace);

    };

//When the user click the 'Enter' key

    const execute = function executeCommand(input) {

        let output;

        if (input.length === 0) {

            return;

        }

        //If what the user entered is not in the command list

        if (!COMMANDS.hasOwnProperty(input)) {

            output = `<p>The command entered is not correct</p>`;

        } else if (input === "cls") {

            terminalOutput.innerHTML = "";
            return;

        } else if (input === "close" || input === "exit" || input === "back") {

            document.location.href = "/home/" // The link that the user enters after sending the exit
            return;

        } else {

            output = COMMANDS[input];

        }


        terminalOutput.innerHTML = `${terminalOutput.innerHTML}<p class="out_code">${output}</p>`;
        Terminal.scrollTop = terminalOutput.scrollHeight;

    };

    let str = '';

    //when user click any key

        const key = function keyEvent(event) {

            let currentKey = event.key;
            Keyboard.focus();
            Keyboard.innerHTML = event.target.value;

            if (BLACKLISTED_KEY_CODES.includes(event.keyCode)) {

                return

            }

            if (!currentKey || currentKey === "Unidentified" || screen.width < 991) {

                currentKey = event.target.value;

            }

            if (event.key === "Enter") {

                execute(userInput.innerHTML);
                userInput.innerHTML = "";
                currentKey = "";
                event.target.value = "";
                str = '';

            } else{

                if(screen.width < 991){

                    str = currentKey;

                } else {

                    str += currentKey;

                }

                event.preventDefault();
                userInput.innerHTML = str;

            }

        }

    //when user click 'BackSpace' key

        const backSpace = function backSpace(e) {
            //if user click backspace
            if (e.keyCode === 8) {

                userInput.innerHTML = userInput.innerHTML.slice(0, userInput.innerHTML.length - 1);
                str = str.slice(0, str.length - 1);

            }

        }

    //When the user clicks on a control buttons
        
        const BTNS = function MenuBTN(t) {

            switch (t) {

                case "max":

                    if (document.getElementById("body").className !== "max") {
                        document.getElementById("body").className = "max";
                    } else {
                        document.getElementById("body").className = "";
                    }
                    break;

                case "min":

                    if (document.getElementById("body").className === "max") {
                        document.getElementById("body").className = "max min";
                    } else if (document.getElementById("body").className !== "max") {
                        document.getElementById("body").className = "min";
                    }
                    break;

                case "re":

                    if (document.getElementById("body").className === "max min") {
                        document.getElementById("body").className = "max";
                    }
                    if (document.getElementById("body").className === "min") {
                        document.getElementById("body").className = "";
                    }
                    break;

            }

        };

document.addEventListener("DOMContentLoaded", app);