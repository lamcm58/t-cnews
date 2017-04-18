// comment
jQuery.ajaxSetup({
  headers : {
    'X-CSRF-Token' : jQuery('meta[name=_token]').attr('content')
  }
});

jQuery(document).ready(
function(e) {
  jQuery("#add_comment").on(
    'submit',
    function(e) {
      e.preventDefault();
      var comment_news_id = jQuery("#comment_news_id").val();
      var comment_name = jQuery("#comment_name").val();
      var comment_content = jQuery("#comment_content").val();

      jQuery.ajax({
        url : "/comment",
        type : "POST",
        data : {
          "comment_news_id" : comment_news_id,
          "comment_name" : comment_name,
          "comment_content" : comment_content
        },
        dataType : 'json',
        success : function(data) {
          jQuery("#add_comment")[0].reset();
          jQuery(".comment-block").prepend(
            '<div class="commment-content"> <strong class="user-nick"> <a href="#">'
              + data.comment_name
              + '</a> </strong> <span class="time-stamp">'
              + data.created_at
              + '</span> <div class="comment-text"> <p>'
              + data.comment_content + '</p> </div> </div>');
        }
      });
    });
});