## პროექტის გაშვება
პროექტი `sail` ით მუშაობს, სეილით გარემოს გამართვისა და `migrate:fresh --seed` ის შემდგომ
გაუშვით `sail artisan app:import-countries` ქვეყნების წამოსაღებად



## ქართული ლოკალიზაცია
ნათარგმნი იქნა ქვეყნის სახელები და რამდენიმე Respone მესიჯი, ქართული ლოკალიზაციისთვის საჭიროა 
`Accept-Language` Header-ი `ka` მნიშვნელობით



## Queue
Event listener-ები მუშაობენ queue-ში, არ დაგავიწყდეთ `queue:work`
