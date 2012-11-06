$(document).ready
(
    function()
    {
        
        $('#login').click
        (
            function(event)
            {
                event.preventDefault();
                navigator.id.request();
            }
        );
        $('#logout').click
        (
            function(event)
            {
                event.preventDefault();
                navigator.id.logout();
            }    
        );
        navigator.id.watch
        (
            {
                loggedInUser: user_email,
                onlogin: function(assertion)
                {
                    $.post
                    (
                        'ajax_controller.php',
                        {
                            action: 'login',
                            assertion: assertion
                        },
                        function(response, status, error)
                        {
                            if (status == 'success') {
                               window.location.reload();
                            }
                        }
                    );
                },
                onlogout: function()
                {
                    $.post
                    (
                        'ajax_controller.php',
                        {
                            action: 'logout'
                        },
                        function(response, status)
                        {

                            window.location.reload();
                        }
                    );
                }
            }
        );
    }
);
