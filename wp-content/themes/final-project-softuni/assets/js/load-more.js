document.addEventListener('DOMContentLoaded', function() {
    var loadMoreButton = document.querySelector('.load-more-button');
    if (loadMoreButton) {
        var page = 2; // Start from the second page
        var postCount = 6; // Number of posts already displayed

        loadMoreButton.addEventListener('click', function() {
            var ajaxurl = this.getAttribute('data-url');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', ajaxurl, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    var response = xhr.responseText;
                    if (response.trim() !== '') {
                        document.querySelector('.most-played .row').insertAdjacentHTML('beforeend', response);
                        postCount += 6; 
                        page++; 
            
                        // Check if the response header indicates more posts
                        var hasMorePosts = xhr.getResponseHeader('Has-More-Posts');
                        if (hasMorePosts === 'false') {
                            loadMoreButton.style.display = 'none'; // Hide the button if no more posts
                        }
                    }  
                } else {
                    console.error('Error fetching posts: ' + xhr.status);
                }
            };
            xhr.onerror = function() {
                console.error('Request failed');
            };
            xhr.send('action=load_more_games&page=' + page + '&post_count=' + postCount);
        });
    }
});
