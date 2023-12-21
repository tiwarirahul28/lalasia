<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Counter with Max Character Limit</title>
    <style>
        .hs-toast-fixed-top {
            position: fixed;
            top: 60px;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .hs-toast-absolute-top {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }

        .hs-toast-wrapper {
            margin: 0 auto;
            max-width: 44rem;
            padding-left: .75rem;
            padding-right: .75rem;
        }

        .hs-toast {
            margin: 0 auto;
            border-radius: .25rem;
            box-shadow: 0 .2rem .5rem rgba(0, 0, 0, .2);
            background: #5b7e96;
            padding: .5rem .75rem;
            max-width: 40rem;
            position: relative;
        }

        .hs-toast-inner {
            display: flex;
        }

        .hs-toast-msg {
            color: white;
            line-height: 1.5rem;
            flex: 1 1 0%;
            min-width: 0;
            padding-top: .2rem;
            padding-left: .5rem;
            padding-right: .75rem;
            overflow-wrap: break-word;
            word-wrap: break-word;
            -webkit-hyphens: auto;
            -ms-hyphens: auto;
            hyphens: auto;
        }

        .hs-toast-msg ul {
            margin: 0;
            padding-left: .75rem;
        }

        .hs-toast-icons,
        .hs-toast-action {
            flex: none;
            color: white;
        }

        .hs-toast-action {
            cursor: pointer;
        }

        .hs-close {
            border: none;
            background: none;
            color: white;
            outline: none;
            padding: 0;
            font-family: 'Arial', Segoe UI Symbol;
        }

        .hs-toast+.hs-toast {
            margin-top: .5rem;
        }

        .hs-theme-error {
            background: #fe4a5d;
        }

        .hs-theme-success {
            background: #00c18c;
        }

        .hs-theme-warning {
            background: #F2711C;
        }

        @keyframes toastShow {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        showToast({
            eleWrapper: '#example',
            msg: 'There is an error while sending message. Please try again later.',
            theme: 'error',
            afterShow: function() {
                console.log('After show function');
            },
            afterClose: function() {
                console.log('After close function');
            }
        });

        $('#showDefaultMsg').click(function() {
            showToast({
                eleWrapper: '#example',
                msg: '204 No Content : The server successfully processed the request.',
                theme: 'info'
            });
        });

        $('#showSuccesstMsg').click(function() {
            showToast({
                eleWrapper: '#example',
                msg: 'Thank you for your message. I will write back soon.',
                theme: 'success'
            });
        });

        $('#showErrorMsg').click(function() {
            showToast({
                eleWrapper: '#example',
                msg: 'There is an error while sending message. Please try again later.',
                theme: 'error'
            });
        });

        $('#showWarningMsg').click(function() {
            showToast({
                eleWrapper: '#example',
                msg: '110 Response is stale MUST be included whenever the returned response is stale.',
                theme: 'warning'
            });
        });

        $('#showMultipleMsg').click(function() {
            showToast({
                eleWrapper: '#example',
                msg: ['110 Response is stale MUST be included whenever the returned response is stale.',
                    '110 Response is stale MUST be included whenever the returned response is stale.'
                ],
                theme: 'error'
            });
        });

        $('#showAutoClose').click(function() {
            showToast({
                eleWrapper: '#example',
                msg: 'Thank you for your message. I will write back soon.',
                theme: 'success',
                closeButton: false,
                autoClose: true
            });
        });

        function showToast(option) {
            var wrapper = $(option.eleWrapper);
            var toast = createToast(option);
            toast = $(toast).hide().fadeIn(750);
            if (option.autoClose) {
                var outTime = option.autoCloseTime || 3500;
                if (outTime < 1000) {
                    outTime = 1000;
                }
                var watch = setTimeout(function() {
                    toast.animate({
                        'margin-top': '-50px',
                        'opacity': '0'
                    }, 500, function() {
                        this.remove();
                        if (option.afterClose) {
                            option.afterClose();
                        }
                    })
                }, outTime);
            }

            $(wrapper).on('click', '.hs-close', function() {
                $(this).closest('.hs-toast').remove();
                //clearTimeout(watch);
                if (option.afterClose) {
                    option.afterClose();
                }
            });

            $(wrapper).append(toast);
            if (option.afterShow) {
                option.afterShow();
            }
        }

        function createToast(option) {
            var final = toastCaseValidation(option);
            var html = `
               <div class="hs-toast hs-theme-` + (option.theme).toLowerCase() + `">
                <div class="hs-toast-inner">                
                  <div class="hs-toast-icons">
                    ` + final.icon + `
                  </div>
                  <div class="hs-toast-msg">
                    ` + final.msg + `
                  </div>
                  <div class="hs-toast-action">
                    ` + final.close + `
                  </div>
                </div>
               </div>`;
            return html;
        }

        function toastCaseValidation(option) {
            var finalOption = {};
            var toastmsg;
            var themeIco;
            var closeBtn = '<button type="button" class="hs-close">&#10006;</button>';
            switch (option.theme) {
                case 'error':
                    themeIco = '<svg aria-hidden="true" focusable="false"  xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 30 30"> <circle fill="none" stroke="#fff" stroke-width="2"  cx="50%" cy="50%" r="13" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset" from="100" to="0" dur="0.9s" /> </circle> <line fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"  x1="10.5" y1="10.5" x2="19.5" y2="19.5" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="4s" /> </line> <line fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"  x1="19.5" y1="10.5" x2="10.5" y2="19.5" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="4s" /> </line> </svg>';
                    break;
                case 'success':
                    themeIco = '<svg aria-hidden="true" focusable="false"  xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 30 30"> <circle fill="none" stroke="#fff" stroke-width="2" cx="50%" cy="50%" r="13" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset" from="100" to="0" dur="0.9s" /> </circle> <polyline fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" points="8,17 13,21 22,10" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="4s" /> </polyline> </svg>';
                    break;
                case 'warning':
                    themeIco = '<svg aria-hidden="true" focusable="false"  xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 30 30" > <path  d="M 13 2 Q 15,0 17,2 L 26,23 Q 26,26 23,26 L 6,26 Q 2,26 3,22 L 13,2" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="0.9s" /> </path> <line  fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" x1="15" y1="9" x2="15" y2="17" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="5s" /> </line> <line  fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" x1="15" y1="21" x2="15" y2="22" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="5s" /> </line> </svg>';
                    break;
                default:
                    themeIco = '<svg aria-hidden="true" focusable="false"  xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 30 30"> <circle fill="none" stroke="#fff" stroke-width="2" cx="50%" cy="50%" r="13" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset" from="100" to="0" dur="0.9s" /> </circle> <line fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" x1="15" y1="9" x2="15" y2="9" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="6s" /> </line> <line fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" x1="15" y1="15" x2="15" y2="22" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="6s" /> </line> </svg>';
            }
            if (option.closeButton == false) {
                closeBtn = '';
            }

            if (option.msg == undefined) {
                toastmsg = 'No Message';
            } else {
                if (option.msg.length != 1 && typeof option.msg === "object") {
                    toastmsg = '<ul>';
                    option.msg.forEach(function(val, index) {
                        toastmsg = toastmsg + '<li>' + val + '</li>';
                    });
                    toastmsg = toastmsg + '</ul>';
                } else {
                    toastmsg = option.msg;
                }
            }
            finalOption.icon = themeIco;
            finalOption.close = closeBtn;
            finalOption.msg = toastmsg;
            return finalOption;
        }
    </script>
</head>

<body>

    <div class="hs-toast-wrapper hs-toast-fixed-top" id="example"></div>

    <div>
        <button id="showDefaultMsg">Default</button>
        <button id="showSuccesstMsg">Success</button>
        <button id="showErrorMsg">Error</button>
        <button id="showWarningMsg">Warning</button>
        <button id="showMultipleMsg">Multiple Message</button>
        <button id="showAutoClose">Auto Close</button>
    </div>


</body>

</html>