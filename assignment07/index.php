<!DOCTYPE html>
<html>
	<head>
		<title>Assigment 07</title>
		<meta charset="utf-8" />

		<style>
			.hidden {
				display: none;
			}

			#second_all_the_chats, #third_all_the_chats, #fourth_all_the_chats {
				padding: 5px;
				font-family: Courier New;
				font-weight: bold;
				font-size: 125%;
				width: 800px;
				height: 350px;
				border: 1px solid black;
			}

			#second_message_tab, #third_message_tab, #fourth_message_tab {
				border: 1px solid black;
				width: 650px;
			}

			#first_nickname_error, #second_change_name_error, #third_change_name_error, #fourth_change_name_error, #second_bad_words, #third_bad_words, #fourth_bad_words, #first_admin_login_error, #admin_logout_successful {
				color: red;
			}
			}

			#second_change_name_tab, #third_change_name_tab, #fourth_change_name_tab {
				border: 1px solid black;
			}

			.rooms {
				text-align: right;
				height: 40px;
				width: 30.5%;
				float: left;
				font-size: 150%;
				padding-top: 15px;
				padding-right: 30px;
				padding-bottom: 8px;
				font-family: Helvetica;
			}

			h1 {
				clear: both;
			}

			.second_room {
				background: rgba(168, 219, 168);
			}

			.third_room {
				background: rgba(121, 189, 154);
			}

			.fourth_room {
				background: rgba(59, 134, 134);
			}

			.active {
				background-color: lightyellow;
			}

			body {
				padding: 20px;
			}

			#admin_div textarea {
			  display: block;
			  width: 80%;
			  height: 150px;
			}


		</style>
	</head>

	<body>

		<div class="rooms second_room hidden" id="second_room">Chat Room 1</div>
		<div class="rooms third_room hidden" id="third_room">Chat Room 2</div>
		<div class="rooms fourth_room hidden" id="fourth_room">Chat Room 3</div>
		<div class="hidden" id="breaks"><br><br><br><br></div>

		<div id="first">
			<h1>Pokemon Chat Room</h1>
			<form>
				Name: <input id="first_nickname" type="text" name="nickname">
				<button id="first_chat_button">Chat!</button>
			</form>
			<br>
			<div id="first_nickname_error" class="hidden"></div>
			<br><br><br><br>
			<strong>Admin Login:</strong>
			<br><br>

			<form>
				Username: <input id="first_admin_username" type="text" name="admin_username"><br>
				Password: <input id="first_admin_password" type="text" name="admin_password"><br><br>
				<button type="submit" id="first_admin_login_button">Login</button>
			</form>
			<br>
			<div id="first_admin_login_error" class="hidden">INCORRECT ADMIN LOGIN INFO...</div>
			<div id="admin_logout_successful" class="hidden">YOU ARE LOGGED OUT</div>
		</div>

		<div id="second" class="hidden">
			<h1>Pokemon Chat Room</h1>
			<textarea id="second_all_the_chats">
			</textarea>
			<br>
			<form>
				<input id="second_message_tab" type="text" name="current_chat">
				<button id="second_send_button">Send Message</button>
			</form>
			<div id="second_bad_words" class="hidden"></div>
			<br id="second_bad_words_break">
			<br><br>
			<form>
				Change Nickname:<br>
				<input id="second_change_name_tab" type="text" name="new_name">
				<button id="second_change_name_button">Change</button>
				<div id="second_change_name_error" class="hidden"></div>
			</form>
			<br>
			<button class="user_logout_button">Logout</button>
		</div>

		<div id="third" class="hidden">
			<h1>Pokemon Chat Room</h1>
			<textarea id="third_all_the_chats">
			</textarea>
			<br>
			<form>
				<input id="third_message_tab" type="text" name="current_chat">
				<button id="third_send_button">Send Message</button>
			</form>
			<div id="third_bad_words" class="hidden"></div>
			<br id="third_bad_words_break">
			<br><br>
			<form>
				Change Nickname:<br>
				<input id="third_change_name_tab" type="text" name="new_name">
				<button id="third_change_name_button">Change</button>
				<div id="third_change_name_error" class="hidden"></div>
			</form>
			<br>
			<button class="user_logout_button">Logout</button>
		</div>

		<div id="fourth" class="hidden">
			<h1>Pokemon Chat Room</h1>
			<textarea id="fourth_all_the_chats">
			</textarea>
			<br>
			<form>
				<input id="fourth_message_tab" type="text" name="current_chat">
				<button id="fourth_send_button">Send Message</button>
			</form>
			<div id="fourth_bad_words" class="hidden"></div>
			<br id="fourth_bad_words_break">
			<br><br>
			<form>
				Change Nickname:<br>
				<input id="fourth_change_name_tab" type="text" name="new_name">
				<button id="fourth_change_name_button">Change</button>
				<div id="fourth_change_name_error" class="hidden"></div>
			</form>
			<br>
			<button class="user_logout_button">Logout</button>
		</div>

		<?php
			include("config.php");
			$data2 = file_get_contents($path . '/messages2.txt');
			$data3 = file_get_contents($path . '/messages3.txt');
			$data4 = file_get_contents($path . '/messages4.txt');
			$bannedwords = file_get_contents($path . '/badwords.txt');
		?>

		<div id="admin_div" class="hidden">
			<h1>Admin Workarea</h1>
			<form>
            	<p>Chat Room 1 Content:</p>
            	<textarea id="admin_chatroom1_content" name="chatroom1_content"><?php print $data2; ?></textarea><br>
            	<button id="admin_update_chatroom1_content_button">Clear Chat History</button>
            	<p>Chat Room 2 Content:</p>
            	<textarea id="admin_chatroom2_content" name="chatroom2_content"></textarea><br>
            	<button id="admin_update_chatroom2_content_button">Clear Chat History</button>
            	<p>Chat Room 3 Content:</p>
            	<textarea id="admin_chatroom3_content" name="chatroom3_content"></textarea><br>
            	<button id="admin_update_chatroom3_content_button">Clear Chat History</button>
            	<p>Banned Words:</p>
            	<textarea id="admin_bannedwords_content" name="chatroom3_content"></textarea><br>
            	<button id="admin_update_bannedwords_content_button">Update</button>
            	
            </form>
            <br>
            <form>
            	<button id="admin_logout_button">Logout</button>
            </form>
		</div>

		<script src="js/jquery-3.3.1.min.js"></script>

		<script>

			$(document).ready(function() {
				
				// get references
				var firstDiv = document.getElementById("first");
				var secondDiv = document.getElementById("second");
				var thirdDiv = document.getElementById("third");
				var fourthDiv = document.getElementById("fourth");
				var firstChatButton = document.getElementById("first_chat_button");
				var secondSendButton = document.getElementById("second_send_button");
				var firstNickname = document.getElementById("first_nickname");
				var firstNicknameError = document.getElementById("first_nickname_error");
				var secondMessageTab = document.getElementById("second_message_tab");
				var secondAllTheChats = document.getElementById("second_all_the_chats");
				var secondChangeNameTab = document.getElementById("second_change_name_tab");
				var secondChangeNameButton = document.getElementById("second_change_name_button");
				var secondChangeNameError = document.getElementById("second_change_name_error");
				var secondBadWords = document.getElementById("second_bad_words");
				var secondBadWordsBreak = document.getElementById("second_bad_words_break");

				var chatroom2 = document.getElementById("second_room");
				var chatroom3 = document.getElementById("third_room");
				var chatroom4 = document.getElementById("fourth_room");
				var breaks = document.getElementById("breaks");
				var firstAdminLoginButton = document.getElementById("first_admin_login_button");
				var firstAdminUsername = document.getElementById("first_admin_username");
				var firstAdminPassword = document.getElementById("first_admin_password");
				var firstAdminLoginError = document.getElementById("first_admin_login_error");
				var adminDiv = document.getElementById("admin_div");
				var adminUpdateChatroom1ContentButton = document.getElementById("admin_update_chatroom1_content_button");
				var adminUpdateChatroom2ContentButton = document.getElementById("admin_update_chatroom2_content_button");
				var adminUpdateChatroom3ContentButton = document.getElementById("admin_update_chatroom3_content_button");
				var adminUpdateBannedwordsContentButton = document.getElementById("admin_update_bannedwords_content_button");
				var adminChatroom1Content = document.getElementById("admin_chatroom1_content");
				var adminChatroom2Content = document.getElementById("admin_chatroom2_content");
				var adminChatroom3Content = document.getElementById("admin_chatroom3_content");
				var adminBannedwordsContent = document.getElementById("admin_bannedwords_content");
				var adminLogoutButton = document.getElementById("admin_logout_button");
				var adminLogoutSuccessful = document.getElementById("admin_logout_successful");
				var userLogoutButtons = document.getElementsByClassName("user_logout_button");

				var thirdSendButton = document.getElementById("third_send_button");
				var thirdMessageTab = document.getElementById("third_message_tab");
				var thirdAllTheChats = document.getElementById("third_all_the_chats");
				var thirdChangeNameTab = document.getElementById("third_change_name_tab");
				var thirdChangeNameButton = document.getElementById("third_change_name_button");
				var thirdChangeNameError = document.getElementById("third_change_name_error");
				var thirdBadWords = document.getElementById("third_bad_words");
				var thirdBadWordsBreak = document.getElementById("third_bad_words_break");

				var fourthSendButton = document.getElementById("fourth_send_button");
				var fourthMessageTab = document.getElementById("fourth_message_tab");
				var fourthAllTheChats = document.getElementById("fourth_all_the_chats");
				var fourthChangeNameTab = document.getElementById("fourth_change_name_tab");
				var fourthChangeNameButton = document.getElementById("fourth_change_name_button");
				var fourthChangeNameError = document.getElementById("fourth_change_name_error");
				var fourthBadWords = document.getElementById("fourth_bad_words");
				var fourthBadWordsBreak = document.getElementById("fourth_bad_words_break");

				// variables
				var onDiv2 = false;
				var onDiv3 = false;
				var onDiv4 = false;

				var s = document.cookie.split("; ");
				var allCookies = {};
				for (var i = 0; i < s.length; i++) {
					var q = s[i].split("=");
					allCookies[q[0]] = q[1];
				}

				<?php 
					if ($_COOKIE['nickname']) { 
				?>
					first.classList.add("hidden");
					second.classList.remove("hidden");
					chatroom2.classList.add("active");
					chatroom2.classList.add("active");
					chatroom2.classList.remove("hidden");
					chatroom3.classList.remove("hidden");
					chatroom4.classList.remove("hidden");
					breaks.classList.remove("hidden");
					getChatMessages2();
				<?php 
					} 
				?>

				// select chatrooms
				chatroom2.addEventListener('click', function(event) {
					firstDiv.classList.add("hidden");
					secondDiv.classList.remove("hidden");
					thirdDiv.classList.add("hidden");
					fourthDiv.classList.add("hidden");
					chatroom2.classList.add("active");
					chatroom3.classList.remove("active");
					chatroom4.classList.remove("active");
					secondChangeNameError.classList.add("hidden");
					thirdChangeNameError.classList.add("hidden");
					fourthChangeNameError.classList.add("hidden");
					secondChangeNameError.innerHTML = "";
					thirdChangeNameError.innerHTML = "";
					fourthChangeNameError.innerHTML = "";
					getChatMessages2();
				});
				chatroom3.addEventListener('click', function(event) {
					firstDiv.classList.add("hidden");
					secondDiv.classList.add("hidden");
					thirdDiv.classList.remove("hidden");
					fourthDiv.classList.add("hidden");
					chatroom2.classList.remove("active");
					chatroom3.classList.add("active");
					chatroom4.classList.remove("active");
					secondChangeNameError.classList.add("hidden");
					thirdChangeNameError.classList.add("hidden");
					fourthChangeNameError.classList.add("hidden");
					secondChangeNameError.innerHTML = "";
					thirdChangeNameError.innerHTML = "";
					fourthChangeNameError.innerHTML = "";
					getChatMessages3(); 
				});
				chatroom4.addEventListener('click', function(event) {
					firstDiv.classList.add("hidden");
					secondDiv.classList.add("hidden");
					thirdDiv.classList.add("hidden");
					fourthDiv.classList.remove("hidden");
					chatroom2.classList.remove("active");
					chatroom3.classList.remove("active");
					chatroom4.classList.add("active");
					secondChangeNameError.classList.add("hidden");
					thirdChangeNameError.classList.add("hidden");
					fourthChangeNameError.classList.add("hidden");
					secondChangeNameError.innerHTML = "";
					thirdChangeNameError.innerHTML = "";
					fourthChangeNameError.innerHTML = "";
					getChatMessages4();
				});

				firstChatButton.addEventListener('click', function(event) {
					event.preventDefault();
					adminLogoutSuccessful.classList.add("hidden");

					$.ajax({ 
			            url: 'nickname.php',
			            type: 'POST',
			            data: {
			            	nickname: firstNickname.value
			            },
			            success: function(data, status) {

			              	if (data === "NICKNAME ERROR") {
			              		firstNicknameError.classList.remove("hidden");
			              		firstNicknameError.innerHTML = "DUPLICATE NICKNAME...";
							}
							else if (data === "EMPTY NICKNAME") {
								firstNicknameError.classList.remove("hidden");
			              		firstNicknameError.innerHTML = "EMPTY NICKNAME...";
							}
							else {
								var s = document.cookie.split("; ");
								var allCookies = {};
								for (var i = 0; i < s.length; i++) {
									var q = s[i].split("=");
									allCookies[q[0]] = q[1];
								}
								firstDiv.classList.add("hidden");
								secondDiv.classList.remove("hidden");
								firstNicknameError.classList.add("hidden");
								chatroom2.classList.add("active");
								chatroom2.classList.remove("hidden");
								chatroom3.classList.remove("hidden");
								chatroom4.classList.remove("hidden");
								breaks.classList.remove("hidden");
								getChatMessages2();
							}
			            }
			        });
				});

				firstAdminLoginButton.addEventListener('click', function(event) {
					event.preventDefault();
					adminLogoutSuccessful.classList.add("hidden");
					updateAdminTextbox2();
					updateAdminTextbox3();
					updateAdminTextbox4();
					updateAdminTextbox5();

					$.ajax({ 
			            url: 'login.php',
			            type: 'POST',
			            data: {
			            	admin_username: firstAdminUsername.value,
			            	admin_password: firstAdminPassword.value
			            },
			            success: function(data, status) {

			              	if (data === "LOGIN SUCCESSFUL") {
			              		firstAdminLoginError.classList.add("hidden");
			              		firstDiv.classList.add("hidden");
			              		adminDiv.classList.remove("hidden");
							}
							else if (data === "LOGIN FAILURE") {
								firstAdminLoginError.classList.remove("hidden");
							}	
			            }
			        });
				});

				adminUpdateChatroom1ContentButton.addEventListener('click', function(event) {
					event.preventDefault();

					$.ajax({ 
			            url: 'clear_content.php',
			            type: 'POST',
			            data: {
			            	num: 1
			            },
			            success: function(data, status) {
			              	adminChatroom1Content.innerHTML = data;
			            }
			        });
				});

				adminUpdateChatroom2ContentButton.addEventListener('click', function(event) {
					event.preventDefault();

					$.ajax({ 
			            url: 'clear_content.php',
			            type: 'POST',
			            data: {
			            	num: 2
			            },
			            success: function(data, status) {
			              	adminChatroom2Content.innerHTML = data;
			            }
			        });
				});

				adminUpdateChatroom3ContentButton.addEventListener('click', function(event) {
					event.preventDefault();

					$.ajax({ 
			            url: 'clear_content.php',
			            type: 'POST',
			            data: {
			            	num: 3
			            },
			            success: function(data, status) {
			              	adminChatroom3Content.innerHTML = data;
			            }
			        });
				});

				adminUpdateBannedwordsContentButton.addEventListener('click', function(event) {
					event.preventDefault();

					$.ajax({ 
			            url: 'clear_content.php',
			            type: 'POST',
			            data: {
			            	num: 4,
			            	content: adminBannedwordsContent.value
			            },
			            success: function(data, status) {
			              	adminBannedwordsContent.innerHTML = data;
			            }
			        });
				});

				adminLogoutButton.addEventListener('click', function(event) {
					event.preventDefault();

					$.ajax({ 
			            url: 'clear_content.php',
			            type: 'POST',
			            data: {
			            	num: 5
			            },
			            success: function(data, status) {
			            	firstAdminUsername.value = "";
			            	firstAdminPassword.value = "";
			            	adminDiv.classList.add("hidden");
			            	firstDiv.classList.remove("hidden");
			              	adminLogoutSuccessful.classList.remove("hidden");
			              	breaks.classList.add("hidden");
							firstNickname.value = "";
							firstNicknameError.classList.add("hidden");
							secondChangeNameError.classList.add("hidden");
							thirdChangeNameError.classList.add("hidden");
							fourthChangeNameError.classList.add("hidden");
							firstAdminLoginError.classList.add("hidden");
							firstNicknameError.innerHTML = "";
							secondChangeNameError.innerHTML = "";
							thirdChangeNameError.innerHTML = "";
							fourthChangeNameError.innerHTML = "";
			            }
			        });
				});

				secondSendButton.addEventListener('click', function(event) {
					event.preventDefault();
					var s = document.cookie.split("; ");
					var allCookies = {};
					for (var i = 0; i < s.length; i++) {
						var q = s[i].split("=");
						allCookies[q[0]] = q[1];
					}

					$.ajax({ 
			            url: 'chatbox.php',
			            type: 'POST',
			            data: {
			            	message: secondMessageTab.value,
			            	num: 2,

			            	<?php 
								if ($_COOKIE['nickname']) { 
							?>
								nickname: allCookies['nickname']
							<?php 
								} 
								else {
							?>
			            		nickname: firstNickname.value
			            	<?php 
								}
							?>
			            },
			            success: function(data, status) {
			            	secondMessageTab.value = "";
			            	if (data === "BAD WORD(S) DETECTED") {
			            		secondBadWords.innerHTML = "COMMENT REMOVED: BAD WORD(S) DETECTED";
			            		secondBadWords.classList.remove("hidden");
			            		secondBadWordsBreak.classList.add("hidden");
			            	}
			            	else {
			            		secondBadWords.classList.add("hidden");
			            		secondBadWordsBreak.classList.remove("hidden");
			            	}
			            }
			        });
				});

				thirdSendButton.addEventListener('click', function(event) {
					event.preventDefault();
					var s = document.cookie.split("; ");
					var allCookies = {};
					for (var i = 0; i < s.length; i++) {
						var q = s[i].split("=");
						allCookies[q[0]] = q[1];
					}

					$.ajax({ 
			            url: 'chatbox.php',
			            type: 'POST',
			            data: {
			            	message: thirdMessageTab.value,
			            	num: 3,

			            	<?php 
								if ($_COOKIE['nickname']) { 
							?>
								nickname: allCookies['nickname']
							<?php 
								} 
								else {
							?>
			            		nickname: firstNickname.value
			            	<?php 
								}
							?>
			            },
			            success: function(data, status) {
			            	thirdMessageTab.value = "";
			            	if (data === "BAD WORD(S) DETECTED") {
			            		thirdBadWords.innerHTML = "COMMENT REMOVED: BAD WORD(S) DETECTED";
			            		thirdBadWords.classList.remove("hidden");
			            		thirdBadWordsBreak.classList.add("hidden");
			            	}
			            	else {
			            		thirdBadWords.classList.add("hidden");
			            		thirdBadWordsBreak.classList.remove("hidden");
			            	}
			            }
			        });
				});

				fourthSendButton.addEventListener('click', function(event) {
					event.preventDefault();
					var s = document.cookie.split("; ");
					var allCookies = {};
					for (var i = 0; i < s.length; i++) {
						var q = s[i].split("=");
						allCookies[q[0]] = q[1];
					}

					$.ajax({ 
			            url: 'chatbox.php',
			            type: 'POST',
			            data: {
			            	message: fourthMessageTab.value,
			            	num: 4,

			            	<?php 
								if ($_COOKIE['nickname']) { 
							?>
								nickname: allCookies['nickname']
							<?php 
								} 
								else {
							?>
			            		nickname: firstNickname.value
			            	<?php 
								}
							?>
			            },
			            success: function(data, status) {
			            	fourthMessageTab.value = "";
			            	if (data === "BAD WORD(S) DETECTED") {
			            		fourthBadWords.innerHTML = "COMMENT REMOVED: BAD WORD(S) DETECTED";
			            		fourthBadWords.classList.remove("hidden");
			            		fourthBadWordsBreak.classList.add("hidden");
			            	}
			            	else {
			            		fourthBadWords.classList.add("hidden");
			            		fourthBadWordsBreak.classList.remove("hidden");
			            	}
			            }
			        });
				});

				function getChatMessages2() {
					if (chatroom2.classList.contains("active")) {
						console.log(2);
						$.ajax({
			            	url: 'data/messages2.txt',
			            	data: {
			            		nocache: Math.random()
			            	},			            	
			            	success: function(data, status) {
			            		secondAllTheChats.innerHTML = data;
			              		setTimeout(getChatMessages2, 500);
			              		if (onDiv2 === false) {scrollToBottom2();}
			            	}
			          	});
			        }
				}

				function getChatMessages3() {
					if (chatroom3.classList.contains("active")) {
						console.log(3);
						$.ajax({
			            	url: 'data/messages3.txt',
			            	data: {
			            		nocache: Math.random()
			            	},
			            	success: function(data, status) {
			            		thirdAllTheChats.innerHTML = data;
			              		setTimeout(getChatMessages3, 500);
			              		if (onDiv3 === false) {scrollToBottom3();}
			            	}
			          	});
			        }
				}

				function getChatMessages4() {
					if (chatroom4.classList.contains("active")) {
						console.log(4);
						$.ajax({
			            	url: 'data/messages4.txt',
			            	data: {
			            		nocache: Math.random()
			            	},
			            	success: function(data, status) {
			            		fourthAllTheChats.innerHTML = data;
			              		setTimeout(getChatMessages4, 500);
			              		if (onDiv4 === false) {scrollToBottom4();}
			            	}
			          	});
					}
				}

				function scrollToBottom2() {
  					$(secondAllTheChats).scrollTop($(secondAllTheChats)[0].scrollHeight);
				}
				function scrollToBottom3() {
  					$(thirdAllTheChats).scrollTop($(thirdAllTheChats)[0].scrollHeight);
				}
				function scrollToBottom4() {
  					$(fourthAllTheChats).scrollTop($(fourthAllTheChats)[0].scrollHeight);
				}

				secondAllTheChats.addEventListener('mouseover', function(event) {onDiv2 = true;});
				secondAllTheChats.addEventListener('mouseout', function(event) {onDiv2 = false;});
				thirdAllTheChats.addEventListener('mouseover', function(event) {onDiv3 = true;});
				thirdAllTheChats.addEventListener('mouseout', function(event) {onDiv3 = false;});
				fourthAllTheChats.addEventListener('mouseover', function(event) {onDiv4 = true;});
				fourthAllTheChats.addEventListener('mouseout', function(event) {onDiv4 = false;});

				secondChangeNameButton.addEventListener('click', function(event) {
					event.preventDefault();

					$.ajax({ 
			            url: 'change_nickname.php',
			            type: 'POST',
			            data: {
		            		nickname: secondChangeNameTab.value
			            },
			            success: function(data, status) {

			            	secondChangeNameTab.value = "";

			            	if (data === "CHANGE ERROR") {
			              		secondChangeNameError.classList.remove("hidden");
			              		secondChangeNameError.innerHTML = "DUPLICATE NICKNAME...";
							}
							else if (data === "EMPTY CHANGE") {
								secondChangeNameError.classList.remove("hidden");
			              		secondChangeNameError.innerHTML = "EMPTY NICKNAME...";
							}
							else {
								firstNickname.value = data;
								allCookies['nickname'] = data;
								secondChangeNameError.classList.remove("hidden");
			              		secondChangeNameError.innerHTML = "NEW NICKNAME: " + firstNickname.value;
							}
			            }
			        });
				});

				thirdChangeNameButton.addEventListener('click', function(event) {
					event.preventDefault();

					$.ajax({ 
			            url: 'change_nickname.php',
			            type: 'POST',
			            data: {
		            		nickname: thirdChangeNameTab.value
			            },
			            success: function(data, status) {

			            	thirdChangeNameTab.value = "";

			            	if (data === "CHANGE ERROR") {
			              		thirdChangeNameError.classList.remove("hidden");
			              		thirdChangeNameError.innerHTML = "DUPLICATE NICKNAME...";
							}
							else if (data === "EMPTY CHANGE") {
								thirdChangeNameError.classList.remove("hidden");
			              		thirdChangeNameError.innerHTML = "EMPTY NICKNAME...";
							}
							else {
								firstNickname.value = data;
								allCookies['nickname'] = data;
								thirdChangeNameError.classList.remove("hidden");
			              		thirdChangeNameError.innerHTML = "NEW NICKNAME: " + firstNickname.value;
							}
			            }
			        });
				});

				fourthChangeNameButton.addEventListener('click', function(event) {
					event.preventDefault();

					$.ajax({ 
			            url: 'change_nickname.php',
			            type: 'POST',
			            data: {
		            		nickname: fourthChangeNameTab.value
			            },
			            success: function(data, status) {

			            	fourthChangeNameTab.value = "";

			            	if (data === "CHANGE ERROR") {
			              		fourthChangeNameError.classList.remove("hidden");
			              		fourthChangeNameError.innerHTML = "DUPLICATE NICKNAME...";
							}
							else if (data === "EMPTY CHANGE") {
								fourthChangeNameError.classList.remove("hidden");
			              		fourthChangeNameError.innerHTML = "EMPTY NICKNAME...";
							}
							else {
								firstNickname.value = data;
								allCookies['nickname'] = data;
								fourthChangeNameError.classList.remove("hidden");
			              		fourthChangeNameError.innerHTML = "NEW NICKNAME: " + firstNickname.value;
							}
			            }
			        });
				});

				for (var i = 0; i < userLogoutButtons.length; i++) {
					userLogoutButtons[i].addEventListener('click', function(event) {
						event.preventDefault();

						$.ajax({ 
				            url: 'user_logout.php',
				            type: 'POST',
				            data: {
				            	nickname: allCookies['nickname']
				            },
				            success: function(data, status) {
				            	// reset everything if user logs out
				            	firstDiv.classList.remove("hidden");
								secondDiv.classList.add("hidden");
								thirdDiv.classList.add("hidden");
								fourthDiv.classList.add("hidden");
								chatroom2.classList.add("hidden");
								chatroom3.classList.add("hidden");
								chatroom4.classList.add("hidden");
								breaks.classList.add("hidden");
								adminLogoutSuccessful.classList.add("hidden");
								firstNickname.value = "";
								firstAdminUsername.value = "";
								firstAdminPassword.value = "";
								firstNicknameError.classList.add("hidden");
								secondChangeNameError.classList.add("hidden");
								thirdChangeNameError.classList.add("hidden");
								fourthChangeNameError.classList.add("hidden");
								firstAdminLoginError.classList.add("hidden");
								firstNicknameError.innerHTML = "";
								secondChangeNameError.innerHTML = "";
								thirdChangeNameError.innerHTML = "";
								fourthChangeNameError.innerHTML = "";
				            }
				        });
					});
				}

				function updateAdminTextbox2() {
					$.ajax({
		            	url: 'data/messages2.txt',
		            	data: {
		            		nocache: Math.random()
		            	},			            	
		            	success: function(data, status) {
		            		adminChatroom1Content.innerHTML = data;
		            	}
		          	});
				}

				function updateAdminTextbox3() {
					$.ajax({
		            	url: 'data/messages3.txt',
		            	data: {
		            		nocache: Math.random()
		            	},			            	
		            	success: function(data, status) {
		            		adminChatroom2Content.innerHTML = data;
		            	}
		          	});
				}

				function updateAdminTextbox4() {
					$.ajax({
		            	url: 'data/messages4.txt',
		            	data: {
		            		nocache: Math.random()
		            	},			            	
		            	success: function(data, status) {
		            		adminChatroom3Content.innerHTML = data;
		            	}
		          	});
				}

				function updateAdminTextbox5() {
					$.ajax({
		            	url: 'data/badwords.txt',
		            	data: {
		            		nocache: Math.random()
		            	},			            	
		            	success: function(data, status) {
		            		adminBannedwordsContent.innerHTML = data;
		            	}
		          	});
				}

			});

		</script>


	</body>
</html>
















