/*!
 *  Lang.js for Laravel localization in JavaScript.
 *
 *  @version 1.1.10
 *  @license MIT https://github.com/rmariuzzo/Lang.js/blob/master/LICENSE
 *  @site    https://github.com/rmariuzzo/Lang.js
 *  @author  Rubens Mariuzzo <rubens@mariuzzo.com>
 */
(function(root,factory){"use strict";if(typeof define==="function"&&define.amd){define([],factory)}else if(typeof exports==="object"){module.exports=factory()}else{root.Lang=factory()}})(this,function(){"use strict";function inferLocale(){if(typeof document!=="undefined"&&document.documentElement){return document.documentElement.lang}}function convertNumber(str){if(str==="-Inf"){return-Infinity}else if(str==="+Inf"||str==="Inf"||str==="*"){return Infinity}return parseInt(str,10)}var intervalRegexp=/^({\s*(\-?\d+(\.\d+)?[\s*,\s*\-?\d+(\.\d+)?]*)\s*})|([\[\]])\s*(-Inf|\*|\-?\d+(\.\d+)?)\s*,\s*(\+?Inf|\*|\-?\d+(\.\d+)?)\s*([\[\]])$/;var anyIntervalRegexp=/({\s*(\-?\d+(\.\d+)?[\s*,\s*\-?\d+(\.\d+)?]*)\s*})|([\[\]])\s*(-Inf|\*|\-?\d+(\.\d+)?)\s*,\s*(\+?Inf|\*|\-?\d+(\.\d+)?)\s*([\[\]])/;var defaults={locale:"en"};var Lang=function(options){options=options||{};this.locale=options.locale||inferLocale()||defaults.locale;this.fallback=options.fallback;this.messages=options.messages};Lang.prototype.setMessages=function(messages){this.messages=messages};Lang.prototype.getLocale=function(){return this.locale||this.fallback};Lang.prototype.setLocale=function(locale){this.locale=locale};Lang.prototype.getFallback=function(){return this.fallback};Lang.prototype.setFallback=function(fallback){this.fallback=fallback};Lang.prototype.has=function(key,locale){if(typeof key!=="string"||!this.messages){return false}return this._getMessage(key,locale)!==null};Lang.prototype.get=function(key,replacements,locale){if(!this.has(key,locale)){return key}var message=this._getMessage(key,locale);if(message===null){return key}if(replacements){message=this._applyReplacements(message,replacements)}return message};Lang.prototype.trans=function(key,replacements){return this.get(key,replacements)};Lang.prototype.choice=function(key,number,replacements,locale){replacements=typeof replacements!=="undefined"?replacements:{};replacements.count=number;var message=this.get(key,replacements,locale);if(message===null||message===undefined){return message}var messageParts=message.split("|");var explicitRules=[];for(var i=0;i<messageParts.length;i++){messageParts[i]=messageParts[i].trim();if(anyIntervalRegexp.test(messageParts[i])){var messageSpaceSplit=messageParts[i].split(/\s/);explicitRules.push(messageSpaceSplit.shift());messageParts[i]=messageSpaceSplit.join(" ")}}if(messageParts.length===1){return message}for(var j=0;j<explicitRules.length;j++){if(this._testInterval(number,explicitRules[j])){return messageParts[j]}}var pluralForm=this._getPluralForm(number);return messageParts[pluralForm]};Lang.prototype.transChoice=function(key,count,replacements){return this.choice(key,count,replacements)};Lang.prototype._parseKey=function(key,locale){if(typeof key!=="string"||typeof locale!=="string"){return null}var segments=key.split(".");var source=segments[0].replace(/\//g,".");return{source:locale+"."+source,sourceFallback:this.getFallback()+"."+source,entries:segments.slice(1)}};Lang.prototype._getMessage=function(key,locale){locale=locale||this.getLocale();key=this._parseKey(key,locale);if(this.messages[key.source]===undefined&&this.messages[key.sourceFallback]===undefined){return null}var message=this.messages[key.source];var entries=key.entries.slice();var subKey="";while(entries.length&&message!==undefined){var subKey=!subKey?entries.shift():subKey.concat(".",entries.shift());if(message[subKey]!==undefined){message=message[subKey];subKey=""}}if(typeof message!=="string"&&this.messages[key.sourceFallback]){message=this.messages[key.sourceFallback];entries=key.entries.slice();subKey="";while(entries.length&&message!==undefined){var subKey=!subKey?entries.shift():subKey.concat(".",entries.shift());if(message[subKey]){message=message[subKey];subKey=""}}}if(typeof message!=="string"){return null}return message};Lang.prototype._findMessageInTree=function(pathSegments,tree){while(pathSegments.length&&tree!==undefined){var dottedKey=pathSegments.join(".");if(tree[dottedKey]){tree=tree[dottedKey];break}tree=tree[pathSegments.shift()]}return tree};Lang.prototype._applyReplacements=function(message,replacements){for(var replace in replacements){message=message.replace(new RegExp(":"+replace,"gi"),function(match){var value=replacements[replace];var allCaps=match===match.toUpperCase();if(allCaps){return value.toUpperCase()}var firstCap=match===match.replace(/\w/i,function(letter){return letter.toUpperCase()});if(firstCap){return value.charAt(0).toUpperCase()+value.slice(1)}return value})}return message};Lang.prototype._testInterval=function(count,interval){if(typeof interval!=="string"){throw"Invalid interval: should be a string."}interval=interval.trim();var matches=interval.match(intervalRegexp);if(!matches){throw"Invalid interval: "+interval}if(matches[2]){var items=matches[2].split(",");for(var i=0;i<items.length;i++){if(parseInt(items[i],10)===count){return true}}}else{matches=matches.filter(function(match){return!!match});var leftDelimiter=matches[1];var leftNumber=convertNumber(matches[2]);if(leftNumber===Infinity){leftNumber=-Infinity}var rightNumber=convertNumber(matches[3]);var rightDelimiter=matches[4];return(leftDelimiter==="["?count>=leftNumber:count>leftNumber)&&(rightDelimiter==="]"?count<=rightNumber:count<rightNumber)}return false};Lang.prototype._getPluralForm=function(count){switch(this.locale){case"az":case"bo":case"dz":case"id":case"ja":case"jv":case"ka":case"km":case"kn":case"ko":case"ms":case"th":case"tr":case"vi":case"zh":return 0;case"af":case"bn":case"bg":case"ca":case"da":case"de":case"el":case"en":case"eo":case"es":case"et":case"eu":case"fa":case"fi":case"fo":case"fur":case"fy":case"gl":case"gu":case"ha":case"he":case"hu":case"is":case"it":case"ku":case"lb":case"ml":case"mn":case"mr":case"nah":case"nb":case"ne":case"nl":case"nn":case"no":case"om":case"or":case"pa":case"pap":case"ps":case"pt":case"so":case"sq":case"sv":case"sw":case"ta":case"te":case"tk":case"ur":case"zu":return count==1?0:1;case"am":case"bh":case"fil":case"fr":case"gun":case"hi":case"hy":case"ln":case"mg":case"nso":case"xbr":case"ti":case"wa":return count===0||count===1?0:1;case"be":case"bs":case"hr":case"ru":case"sr":case"uk":return count%10==1&&count%100!=11?0:count%10>=2&&count%10<=4&&(count%100<10||count%100>=20)?1:2;case"cs":case"sk":return count==1?0:count>=2&&count<=4?1:2;case"ga":return count==1?0:count==2?1:2;case"lt":return count%10==1&&count%100!=11?0:count%10>=2&&(count%100<10||count%100>=20)?1:2;case"sl":return count%100==1?0:count%100==2?1:count%100==3||count%100==4?2:3;case"mk":return count%10==1?0:1;case"mt":return count==1?0:count===0||count%100>1&&count%100<11?1:count%100>10&&count%100<20?2:3;case"lv":return count===0?0:count%10==1&&count%100!=11?1:2;case"pl":return count==1?0:count%10>=2&&count%10<=4&&(count%100<12||count%100>14)?1:2;case"cy":return count==1?0:count==2?1:count==8||count==11?2:3;case"ro":return count==1?0:count===0||count%100>0&&count%100<20?1:2;case"ar":return count===0?0:count==1?1:count==2?2:count%100>=3&&count%100<=10?3:count%100>=11&&count%100<=99?4:5;default:return 0}};return Lang});

(function () {
    Lang = new Lang();
    Lang.setMessages({"en.adminMess":{"btn_add":"Add","btn_addTopic":"Add Topic","btn_addUser":"Add User","btn_allNoti":"View all notification","btn_del":"Del","btn_edit":"Edit","btn_logout":"Logout","btn_reset":"Reset","btn_search":"Search","confirmDelete":"Are you sure you delete it?","lb_addUser":"Add User","lb_address":"Address","lb_avatar":"Avatar","lb_birthday":"Birthday","lb_choosePicture":"Change Picture","lb_editTopic":"Edit Topic","lb_editUser":"Edit User","lb_email":"Email","lb_fullname":"Fullname","lb_gender":"Gender","lb_haveMess":"You have new message","lb_home":"Home","lb_lesson":"Lessons","lb_manage":"Manage","lb_manageTopics":"Manage Topics","lb_manageUser":"Manage Users","lb_newNoti":"new notification","lb_noChoosePicture":"Not Change","lb_option":"option","lb_password":"Password","lb_phone":"Phone","lb_picture":"Picture","lb_preview":"Preview","lb_rePassword":"Re-Password","lb_role":"Role","lb_search...":"Search...","lb_status":"status","lb_topic":"Topics","lb_topicName":"Topic name","lb_user":"Users","lb_userData":"Users Data","lb_username":"Username","lb_word":"Words","lb_youHave":"You have","messFindFail":"No id found","msg_addSuccess":"Delete successfully","msg_addUserFail":"Add User Fail","msg_addUserSuccess":"Add User Successfully","msg_delFail":"Delete fail","msg_delUserFail":"Delete User Fail","msg_delUserSuccess":"Delete User Successfully","msg_editFail":"Edit fail","msg_editSuccess":"Edit successfully","msg_editUserFail":"Edit User Fail","msg_editUserSuccess":"Edit User Successfully","place_address":"Input Address","place_email":"Input Email","place_fullname":"Input Fullname","place_inputTopicName":"Input topic name","place_password":"Input Password","place_phone":"Input Phone","place_rePassword":"Input Re-Password","place_textArea":"Content...","place_username":"Input Username","val_address":"Please input address","val_birthday":"Please input birthday","val_email":"Please input email","val_email2":"Please input the correct email format","val_fullname":"Please input fullname","val_password":"Please input password","val_phone":"Please input phone","val_repassword":"Please input re-password","val_username":"Please input username","validation_picture":"Please choose picture!","validation_preview":"Please input preview!","validation_topicname":"Please input topic name!"},"en.auth":{"createfail":"Create Account Failure","createsuccessfull":"Welcome! Your account has been successfully created!","email":"Email","email_required":"email field cannot be blank","failed":"These credentials do not match our records.","fullname":"Fullname","fullname_required":"fullname field cannot be blank","home":"home","linklogin":"you had account !","linkregister":"Do not have an account?","login":"login","loginfail":"Login Failure","loginfb":"Log In with Facebook","logingg":"Log In with Google","logintw":"Log In with Twitter","password":"Password","password_required":"password field cannot be blank","pwconfirm_confirm":"password confirm must same password ","pwconfirm_required":"password confirm field cannot be blank","register":"Sign Up","repassword":"Confirm-Password","throttle":"Too many login attempts. Please try again in :seconds seconds.","title":"Welcome Back ","username":"Username","username_required":"username field cannot be blank","welcome":"welcome to the Framgia E-Learning System"},"en.messages":{"btn_about":"About","btn_contact":"Contact","btn_home":"Home","btn_login":"Login","btn_logout":"Logout","btn_readmore":"Load More","btn_search":"Search","btn_test":"Go Test","btn_topic":"Topic","btn_viewDetail":"View Detail","btn_viewLesson":"VIEW LESSON","index_title":"Framgia E-learning System","label_lsdetail_note":"Listen and remember the following vocabulary","lang.en":"English","lang.vi":"Vietnamese","lb_allTopic":"Topic","lb_allWord":"All Words","lb_contactUs":"Contact","lb_home":"Home","lb_notYetSaveWord":"Not yet saved","lb_quickLink":"Quick Link","lb_rememberes":"Saved","lb_saveWord":"Saved","lb_search":"Search ...","lb_topic":"TOPIC","lb_topicToday":"Topic Today","lb_vocabularyToday":"Vocabulary Today","lb_words":"Words","lb_working":"Working Hour","lesson_decription":"All Topic","lesson_detail_title":"LESSON DETAIL","lesson_title":"LESSON","list_word_followed":"List of vocabulary being tracked","loginBack":"You need to log out so you can go to the Login page","needLogin":"Please Login for save this word","span_spell":"spelling","span_trans":"Translation","sum_word_followed":"Total words are being tracked","view_bug":"An error occurred!","word_remember_title":"vocabulary to remember"},"en.pagination":{"next":"Next &raquo;","previous":"&laquo; Previous"},"en.passwords":{"password":"Passwords must be at least six characters and match the confirmation.","reset":"Your password has been reset!","sent":"We have e-mailed your password reset link!","token":"This password reset token is invalid.","user":"We can't find a user with that e-mail address."},"en.validation":{"accepted":"The :attribute must be accepted.","active_url":"The :attribute is not a valid URL.","after":"The :attribute must be a date after :date.","after_or_equal":"The :attribute must be a date after or equal to :date.","alpha":"The :attribute may only contain letters.","alpha_dash":"The :attribute may only contain letters, numbers, dashes and underscores.","alpha_num":"The :attribute may only contain letters and numbers.","array":"The :attribute must be an array.","attributes":[],"before":"The :attribute must be a date before :date.","before_or_equal":"The :attribute must be a date before or equal to :date.","between":{"array":"The :attribute must have between :min and :max items.","file":"The :attribute must be between :min and :max kilobytes.","numeric":"The :attribute must be between :min and :max.","string":"The :attribute must be between :min and :max characters."},"boolean":"The :attribute field must be true or false.","confirmed":"The :attribute confirmation does not match.","custom":{"attribute-name":{"rule-name":"custom-message"}},"date":"The :attribute is not a valid date.","date_equals":"The :attribute must be a date equal to :date.","date_format":"The :attribute does not match the format :format.","different":"The :attribute and :other must be different.","digits":"The :attribute must be :digits digits.","digits_between":"The :attribute must be between :min and :max digits.","dimensions":"The :attribute has invalid image dimensions.","distinct":"The :attribute field has a duplicate value.","email":"The :attribute must be a valid email address.","exists":"The selected :attribute is invalid.","file":"The :attribute must be a file.","filled":"The :attribute field must have a value.","gt":{"array":"The :attribute must have more than :value items.","file":"The :attribute must be greater than :value kilobytes.","numeric":"The :attribute must be greater than :value.","string":"The :attribute must be greater than :value characters."},"gte":{"array":"The :attribute must have :value items or more.","file":"The :attribute must be greater than or equal :value kilobytes.","numeric":"The :attribute must be greater than or equal :value.","string":"The :attribute must be greater than or equal :value characters."},"image":"The :attribute must be an image.","in":"The selected :attribute is invalid.","in_array":"The :attribute field does not exist in :other.","integer":"The :attribute must be an integer.","ip":"The :attribute must be a valid IP address.","ipv4":"The :attribute must be a valid IPv4 address.","ipv6":"The :attribute must be a valid IPv6 address.","json":"The :attribute must be a valid JSON string.","lt":{"array":"The :attribute must have less than :value items.","file":"The :attribute must be less than :value kilobytes.","numeric":"The :attribute must be less than :value.","string":"The :attribute must be less than :value characters."},"lte":{"array":"The :attribute must not have more than :value items.","file":"The :attribute must be less than or equal :value kilobytes.","numeric":"The :attribute must be less than or equal :value.","string":"The :attribute must be less than or equal :value characters."},"max":{"array":"The :attribute may not have more than :max items.","file":"The :attribute may not be greater than :max kilobytes.","numeric":"The :attribute may not be greater than :max.","string":"The :attribute may not be greater than :max characters."},"mimes":"The :attribute must be a file of type: :values.","mimetypes":"The :attribute must be a file of type: :values.","min":{"array":"The :attribute must have at least :min items.","file":"The :attribute must be at least :min kilobytes.","numeric":"The :attribute must be at least :min.","string":"The :attribute must be at least :min characters."},"not_in":"The selected :attribute is invalid.","not_regex":"The :attribute format is invalid.","numeric":"The :attribute must be a number.","present":"The :attribute field must be present.","regex":"The :attribute format is invalid.","required":"The :attribute field is required.","required_if":"The :attribute field is required when :other is :value.","required_unless":"The :attribute field is required unless :other is in :values.","required_with":"The :attribute field is required when :values is present.","required_with_all":"The :attribute field is required when :values are present.","required_without":"The :attribute field is required when :values is not present.","required_without_all":"The :attribute field is required when none of :values are present.","same":"The :attribute and :other must match.","size":{"array":"The :attribute must contain :size items.","file":"The :attribute must be :size kilobytes.","numeric":"The :attribute must be :size.","string":"The :attribute must be :size characters."},"starts_with":"The :attribute must start with one of the following: :values","string":"The :attribute must be a string.","timezone":"The :attribute must be a valid zone.","unique":"The :attribute has already been taken.","uploaded":"The :attribute failed to upload.","url":"The :attribute format is invalid.","uuid":"The :attribute must be a valid UUID."},"vi.adminMess":{"btn_add":"Th\u00eam","btn_addTopic":"Th\u00eam ch\u1ee7 \u0111\u1ec1","btn_addUser":"Th\u00eam ng\u01b0\u1eddi d\u00f9ng","btn_allNoti":"Xem t\u1ea5t c\u1ea3 th\u00f4ng b\u00e1o","btn_del":"X\u00f3a","btn_edit":"S\u1eeda","btn_logout":"\u0110\u0103ng xu\u1ea5t","btn_reset":"\u0110\u1eb7t l\u1ea1i","btn_search":"T\u00ecm ki\u1ebfm","confirmDelete":"B\u1ea1n c\u00f3 ch\u1eafc l\u00e0 x\u00f3a?","lb_addUser":"Th\u00eam ng\u01b0\u1eddi d\u00f9ng","lb_address":"\u0110\u1ecba ch\u1ec9","lb_avatar":"\u1ea2nh \u0111\u1ea1i di\u1ec7n","lb_birthday":"Ng\u00e0y sinh","lb_choosePicture":"\u0110\u1ed5i h\u00ecnh \u1ea3nh","lb_editTopic":"S\u1eeda ch\u1ee7 \u0111\u1ec1","lb_editUser":"S\u1eeda th\u00f4ng tin ng\u01b0\u1eddi d\u00f9ng","lb_email":"Email","lb_fullname":"T\u00ean \u0111\u1ea7y \u0111\u1ee7","lb_gender":"Gi\u1edbi t\u00ednh","lb_haveMess":"B\u1ea1n c\u00f3 tin nh\u1eafn","lb_home":"Trang ch\u1ee7","lb_lesson":"B\u00e0i h\u1ecdc","lb_manage":"Qu\u1ea3n l\u00fd","lb_manageTopics":"Qu\u1ea3n l\u00fd ch\u1ee7 \u0111\u1ec1","lb_manageUser":"Qu\u1ea3n l\u00fd ng\u01b0\u1eddi d\u00f9ng","lb_newNoti":"th\u00f4ng b\u00e1o m\u1edbi","lb_noChoosePicture":"Kh\u00f4ng \u0111\u1ed5i","lb_option":"T\u00f9y ch\u1ecdn","lb_password":"M\u1eadt kh\u1ea9u","lb_phone":"S\u1ed1 \u0111i\u1ec7n tho\u1ea1i","lb_picture":"H\u00ecnh \u1ea3nh","lb_preview":"Gi\u1edbi thi\u1ec7u","lb_rePassword":"Nh\u1eadp l\u1ea1i m\u1eadt kh\u1ea9u","lb_role":"Vai tr\u00f2","lb_search...":"T\u00ecm ki\u1ebfm...","lb_status":"Tr\u1ea1ng th\u00e1i","lb_topic":"Ch\u1ee7 \u0111\u1ec1","lb_topicName":"T\u00ean ch\u1ee7 \u0111\u1ec1","lb_user":"Ng\u01b0\u1eddi d\u00f9ng","lb_userData":"D\u1eef li\u1ec7u ng\u01b0\u1eddi d\u00f9ng","lb_username":"T\u00ean","lb_word":"T\u1eeb v\u1ef1ng","lb_youHave":"B\u1ea1n c\u00f3","messFindFail":"Kh\u00f4ng t\u00ecm th\u1ea5y id","msg_addFail":"Th\u00eam th\u1ea5t b\u1ea1i","msg_addSuccess":"Th\u00eam th\u00e0nh c\u00f4ng","msg_addUserFail":"Th\u00eam ng\u01b0\u1eddi d\u00f9ng kh\u00f4ng th\u00e0nh c\u00f4ng","msg_addUserSuccess":"Th\u00eam ng\u01b0\u1eddi d\u00f9ng th\u00e0nh c\u00f4ng","msg_delFail":"X\u00f3a th\u1ea5t b\u1ea1i","msg_delSuccess":"X\u00f3a th\u00e0nh c\u00f4ng","msg_delUserFail":"X\u00f3a ng\u01b0\u1eddi d\u00f9ng kh\u00f4ng th\u00e0nh c\u00f4ng","msg_delUserSuccess":"X\u00f3a ng\u01b0\u1eddi d\u00f9ng th\u00e0nh c\u00f4ng","msg_editFail":"S\u1eeda th\u1ea5t b\u1ea1i","msg_editSuccess":"S\u1eeda th\u00e0nh c\u00f4ng","msg_editUserFail":"S\u1eeda th\u00f4ng tin ng\u01b0\u1eddi d\u00f9ng kh\u00f4ng th\u00e0nh c\u00f4ng","msg_editUserSuccess":"S\u1eeda th\u00f4ng tin ng\u01b0\u1eddi d\u00f9ng th\u00e0nh c\u00f4ng","place_address":"Nh\u1eadp \u0111\u1ecba ch\u1ec9","place_email":"Nh\u1eadp email","place_fullname":"Nh\u1eadp t\u00ean \u0111\u1ea7y \u0111\u1ee7","place_inputTopicName":"Nh\u1eadp t\u00ean ch\u1ee7 \u0111\u1ec1","place_password":"Nh\u1eadp m\u1eadt kh\u1ea9u","place_phone":"Nh\u1eadp s\u1ed1 \u0111i\u1ec7n tho\u1ea1i","place_rePassword":"Nh\u1eadp l\u1ea1i m\u1eadt kh\u1ea9u","place_textArea":"N\u1ed9i dung...","place_username":"Nh\u1eadp t\u00ean","val_address":"Vui l\u00f2ng nh\u1eadp \u0111\u1ecba ch\u1ec9","val_birthday":"Vui l\u00f2ng nh\u1eadp ng\u00e0y sinh","val_email":"Vui l\u00f2ng nh\u1eadp email","val_email2":"Vui l\u00f2ng nh\u1eadp \u0111\u00fang \u0111\u1ecbnh d\u1ea1ng email","val_fullname":"Vui l\u00f2ng nh\u1eadp t\u00ean \u0111\u1ea7y \u0111\u1ee7","val_password":"Vui l\u00f2ng nh\u1eadp m\u1eadt kh\u1ea9u","val_phone":"Vui l\u00f2ng nh\u1eadp s\u1ed1 \u0111i\u1ec7n tho\u1ea1i","val_repassword":"Vui l\u00f2ng nh\u1eadp l\u1ea1i m\u1eadt kh\u1ea9u","val_username":"Vui l\u00f2ng nh\u1eadp t\u00ean","validation_picture":"Vui l\u00f2ng ch\u1ecdn h\u00ecnh \u1ea3nh!","validation_preview":"Vui l\u00f2ng nh\u1eadp n\u1ed9i dung!","validation_topicname":"Vui l\u00f2ng nh\u1eadp t\u00ean ch\u1ee7 \u0111\u1ec1!"},"vi.auth":{"createfail":"T\u1ea1o t\u00e0i kho\u1ea3n th\u1ea5t b\u1ea1i","createsuccessfull":"Ch\u00e0o m\u1eebng b\u1ea1n Tai khoa\u0309n cu\u0309a ba\u0323n \u0111a \u0111\u01b0\u01a1\u0323c ta\u0323o thanh c\u00f4ng!","email":"Email","email_required":"tr\u01b0\u1eddng email kh\u00f4ng th\u1ec3 \u0111\u1ec3 tr\u1ed1ng","fullname":"Ho ten day du","fullname_required":"tr\u01b0\u1eddng h\u1ecd t\u00ean kh\u00f4ng th\u1ec3 \u0111\u1ec3 tr\u1ed1ng","home":"Trang Chu","linklogin":"Ban Da Co tai Khoan !","linkregister":"Ban Khong Co Tai Khoan ?","login":"Dang Nhap","loginfail":"\u0110\u0103ng nh\u1eadp th\u1ea5t b\u1ea1i","loginfb":"Dang Nhap Bang FaceBook","logingg":"Dang Nhap Bang Google","logintw":"Dang Nhap Bang Twitter","password":"Mat Khau","password_required":"m\u1eadt kh\u1ea9u  kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng","pwconfirm_confirm":"m\u1eadt kh\u1ea9u x\u00e1c nh\u1eadn ph\u1ea3i tr\u00f9ng kh\u1edbp v\u1edbi m\u1eadt kh\u1ea9u \u0111\u00e3 nh\u1eadp tr\u01b0\u1edbc \u0111\u00f3.","pwconfirm_required":"x\u00e1c nh\u1eadn m\u1eadt kh\u1ea9u  kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng","register":"Dang Ky","repassword":"Xac nhan mat khau","title":"Chao Mung Tro Lai","username":"Ten Tai Khoan","username_required":"t\u00ean \u0111\u0103ng nh\u1eadp  kh\u00f4ng \u0111\u01b0\u1ee3c \u0111\u1ec3 tr\u1ed1ng","welcome":"Chao Mung den voi he thong giao duc tieng anh cua Framgia"},"vi.messages":{"btn_about":"Gi\u1edbi thi\u1ec7u","btn_contact":"Li\u00ean h\u1ec7","btn_home":"Trang ch\u1ee7","btn_login":"\u0110\u0103ng nh\u1eadp","btn_logout":"Dang Xuat","btn_readmore":"Xem th\u00eam","btn_search":"T\u00ecm ki\u1ebfm","btn_test":"Ti\u1ebfn T\u1edbi B\u00e0i Test","btn_topic":"Ch\u1ee7 \u0111\u1ec1","btn_viewDetail":"Xem chi ti\u1ebft","btn_viewLesson":"XEM B\u00c0I H\u1eccC","index_title":"H\u1ec7 th\u1ed1ng h\u1ecdc t\u1eadp \u0111i\u1ec7n t\u1eed Framgia","label_lsdetail_note":"H\u00e3y l\u1eafng nghe v\u00e0 ghi nh\u1edb c\u00e1c t\u1eeb v\u1ef1ng sau \u0111\u00e2y","lang.en":"Ti\u1ebfng Anh","lang.vi":"Ti\u1ebfng Vi\u1ec7t","lb_allTopic":"Ch\u1ee7 \u0110\u1ec1","lb_allWord":"T\u1ea5t c\u1ea3 t\u1eeb v\u1ef1ng","lb_contactUs":"Li\u00ean h\u1ec7","lb_home":"Trang ch\u1ee7","lb_notYetSaveWord":"Ch\u01b0a l\u01b0u","lb_quickLink":"T\u1eeb kh\u00f3a nhanh","lb_rememberes":"\u0110\u00e3 l\u01b0u","lb_saveWord":"\u0110\u00e3 l\u01b0u","lb_search":"T\u00ecm ki\u1ebfm ...","lb_topic":"CH\u1ee6 \u0110\u1ec0","lb_topicToday":"Ch\u1ee7 \u0110\u1ec1 H\u00f4m Nay","lb_vocabularyToday":"T\u1eeb V\u1ef1ng H\u00f4m Nay","lb_words":"T\u1eeb v\u1ef1ng","lb_working":"Gi\u1edd l\u00e0m vi\u1ec7c","lesson_decription":"T\u1ea5t c\u1ea3 c\u00e1c ch\u1ee7 \u0111\u1ec1","lesson_detail_title":"Chi Ti\u1ebft B\u00e0i H\u1ecdc","lesson_title":"B\u00e0i H\u1ecdc","list_word_followed":"danh s\u00e1ch c\u00e1c t\u1eeb v\u1ef1ng \u0111ang \u0111\u01b0\u1ee3c theo d\u00f5i","loginBack":"B\u1ea1n c\u1ea7n \u0111\u0103ng xu\u1ea5t \u0111\u1ec3 c\u00f3 th\u1ec3 c\u00f3 th\u1ec3 t\u1edbi trang \u0110\u0103ng nh\u1eadp","needLogin":"Vui l\u00f2ng \u0111\u0103ng nh\u1eadp \u0111\u1ec3 l\u01b0u t\u1eeb v\u1ef1ng","span_spell":"phi\u00ean \u00e2m","span_trans":"d\u1ecbch ngh\u0129a","sum_word_followed":"T\u1ed5ng s\u1ed1 t\u1eeb \u0111ang \u0111\u01b0\u1ee3c theo d\u00f5i","view_bug":"C\u00f3 l\u1ed7i x\u1ea3y ra","word_remember_title":"t\u1eeb v\u1ef1ng c\u1ea7n nh\u1edb"}});
})();
