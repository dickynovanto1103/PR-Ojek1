# PR-Ojek1
Web Development course first assignment using PHP as backend, HTML, CSS as frontend. Javascript used as a validation tool for checking whether input required in some form is filled or not.
## Members
* Dicky Novanto(https://github.com/dickynovanto1103)
* Roland Hartanto(https://github.com/rolandhartanto)
* Daniel Pintara(https://github.com/nieltg)

# Pembagian Tugas
## Tampilan:

- Login : 13515071
- Register : 13515071
- Profile: 13515107
- Edit-Profile: 13515107
- Edit-Preferred-Location: 13515107
- Order-Ojek: 13515134, 13515107
- Select-Driver: 13515134, 13515107
- Complete-Order: 13515134, 13515107
- History: 13515071


## Fungsionalitas


- Login : 13515071
- Register : 13515071
- Profile: 13515107
- Edit-Profile: 13515107
- Edit-Preferred-Location: 13515107
- Order-Ojek: 13515134
- Select-Driver: 13515134
- Complete-Order: 13515134
- History: 13515071

# Dokumentasi Aplikasi
## Login

![](/Image for Readme/login.PNG?raw=true);

Berikut adalah halaman login yang ditampilkan dalam aplikasi web kami. Apabila pengguna tidak dapat memiliki akun, maka pengguna dapat memilih link "don't have an account?" dan akan diarahkan ke dalam situs register.

## Register

![](/Image for Readme/register.PNG?raw=true);

Berikut adalah halaman register yang dapat mendaftarkan pengguna baru dan data-data tersebut dapat dimasukkan ke dalam basis data pengguna yang telah dibuat.
Terdapat pengecekan username dan email user yang dimasukkan.

## Profile

![](/Image for Readme/profile.PNG?raw=true);

Berikut adalah tampilan profile. Tampilan profile ini menampilkan info-info terkait user, misalnya username, email, nama lengkap, dan lain lain. 
Dalam tampilan profile ini, dapat disediakan opsi untuk menambahkan lokasi yang disukai (preferred location) dan mengganti profile di bagian Edit-profile dan masing-masing dilakukan dengan mengeklik tombol pena di samping bagian My Profile dan Preferred Location.

## Edit-Profile
![](/Image for Readme/edit_profile.PNG?raw=true);

Dalam edit profile ini, pengguna dapat mengganti profile picture, nama pengguna, nomor telepon, status driver (on/off). Untuk melakukan perubahan, harus ditekan tombol "SAVE".
Jika ingin membatalkan perubahan yang telah diketik, maka pengguna dapat memilih untuk menekan tombol "BACK".

## Preferred Location

![](/Image for Readme/preferred_location.PNG?raw=true);

Pada bagian Preferred Location ini, pengguna ditunjukkan tabel berisi list nama lokasi yang disukai serta diberi pilihan untuk melakukan edit atau penghapusan pada row tertentu.
Selain itu, pengguna juga dapat menambahkan lokasi baru yang disukai dan ketika tombol "ADD" ditekan, maka tabel akan mengalami penambahan 1 row dengan nama lokasi yang telah ditambahkan tersebut dimunculkan.

## History

![](/Image for Readme/driver_history.PNG?raw=true);

Pada menu History ini, dapat ditampilkan rekam jejak pemesanan ojek dari pengguna kepada suatu driver dan terdapat dalam tab "My Previous Orders".
Sedangkan untuk melihat rekam jejak sebagai driver, dapat ditampilkan datanya pada tab "Driver History". Pada History ini, terdapat tombol Hide yang berguna untuk menghapus rekam jejak dari tampilan saja, namun tidak dihapus dari basis data.

## Order-Ojek

Pada fitur order-ojek ini, dapat dibagi menjadi 2 kasus, yaitu:

### Order-Ojek tidak berhasil

![](/Image for Readme/order_ojek_gagal.PNG?raw=true);

Pada kasus tersebut, pengguna tidak memasukkan salah satu atau semua field yang dibutuhkan untuk diisi, yaitu picking point dan destination. 
Jika pengguna melakukan kasus ini, maka akan dikeluarkan pesan kesalahan untuk mengisi semua field yang tersedia. FItur ini menggunakan javascript.

### Order-Ojek berhasil

![](/Image for Readme/order_ojek_berhasil.PNG?raw=true);

Pada kasus diatas, pengguna boleh mengisikan preferred drivernya. 
Untuk driver dengan username yang sama dengan hasil input, maka pada halaman select_driver kemudian, akan ditampilkan informasi terkait preffered drver tersebut.

## Select-Driver

![](/Image for Readme/select_driver1.PNG?raw=true);
![](/Image for Readme/select_driver2.PNG?raw=true);

Pada halaman ini, pengguna dapat memilih driver yang akan dijadikan ojek, yaitu dengan menekan tombol "I CHOOSE YOU!".
Kemudian untuk melanjutkan ke tahap selanjutnya, yaitu complete order, maka pengguna harus menekan tombol "CONFIRM".

## Complete-Order

![](/Image for Readme/complete_order.PNG?raw=true);

Pada halaman ini, akan ditampilkan informasi-informasi terkait driver, yaitu foto profil, username, dan nama lengkap. Lalu pengguna dapat memberikan rating dengan range 1-5 dan pengguna harus memberikan komentar.
Jika form telah dilakukan semua secara menyeluruh, maka pengguna harus menekan tombol "COMPLETE ORDER".

