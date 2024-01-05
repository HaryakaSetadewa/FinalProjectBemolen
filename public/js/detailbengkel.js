let isBengkelOnTheWay = true; 

        function pesanSekarang() {
            const modal = document.getElementById('myModal');
            modal.style.display = 'flex';
        }


        function closeModal() {
            const modal = document.getElementById('myModal');
            modal.style.display = 'none';

            if (isBengkelOnTheWay) {
                console.log('Pesanan berhasil!');
            }
        }

        function setUserRating(event, rating) {
            for (let i = 1; i <= 5; i++) {
                const star = document.getElementById('star' + i); 
                if (i <= rating) {
                    star.innerText = '★';
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-500');
                } else {
                    star.innerText = '☆';
                    star.classList.remove('text-yellow-500');
                    star.classList.add('text-gray-300');
                }
            }
        }