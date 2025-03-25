document.addEventListener("DOMContentLoaded", function () {
    // Handle Like Button
    document.querySelectorAll(".like-btn").forEach(button => {
        button.addEventListener("click", function () {
            let likeCount = this.querySelector(".like-count");
            let currentLikes = parseInt(likeCount.textContent);

            if (this.classList.contains("liked")) {
                this.classList.remove("liked");
                this.classList.replace("btn-danger", "btn-outline-danger");
                likeCount.textContent = currentLikes - 1;
            } else {
                this.classList.add("liked");
                this.classList.replace("btn-outline-danger", "btn-danger");
                likeCount.textContent = currentLikes + 1;
            }
        });
    });

                // Toggle Comment Box
                document.getElementById("showCommentBox").addEventListener("click", function() {
                    document.getElementById("commentBox").style.display = "block";
                    this.style.display = "none";
                });

                document.getElementById("cancelComment").addEventListener("click", function() {
                    document.getElementById("commentBox").style.display = "none";
                    document.getElementById("showCommentBox").style.display = "block";
                });

                // Like Button Functionality
                let likeCount = 0;
                document.getElementById("likeButton").addEventListener("click", function() {
                    likeCount++;
                    document.getElementById("likeCount").textContent = likeCount;
                    this.classList.toggle("btn-danger");
                    this.classList.toggle("btn-outline-danger");
                });
});
