<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016102500758030",

		//商户私钥
		'merchant_private_key' => "MIIEogIBAAKCAQEAhX7Tt9AC2R96FoqYvPw4j6DYvFutjXadkHRDMnJXPu8NhLK4fzq+uXdjao0PyEYQ28e0UxDHnydIEDfMfWH10stLpk4PlUO4RtQ/IIZgJ8JmCpe/+iX84pEAb/eW/mDNrYPwe9FdsjpHZh9r89reFrUGeXJ5gtiuVGy/vOh3d4eV5zWL3KQlyqBLL1gImwHAJHXJnwAyUp9HVqxF1KOVKdgiaeXocJNIWPLe2TL6fX6IiGNs92jZ5g1wlrLi4LUo4DPjrj1ppssUqW0BQ5JWn75mtefxI8qD6FbSxw/DbAkzWnunhADaLW1wi6falfdo7EsW2ckzV0qN1o6Ttm86gwIDAQABAoIBAFvcNwIQcDVKNK/YNVwuTxl+fEW47Ecg7TGe3zKSfbi/tNSwSsa5/M4Q+mcypD6TADzMQii6rjK1TCBk1SEeTJL985N/ubdjvyV2He5aqUYSvjbhz2fpxgd98ggaHlvy7vVMiioZmtjuw3zheF54KEUF0mu1uymvwt4zawkqCjNEJKepvItLbKKyxKQ+FU9f51zzQl1XyPOIU3C8TKtUNfwWiqni6VbUW3RF3cX0r/h5IFjCTsruIArWDJ/BDMKJfEm5jPzVjrkcce5G7HjTTf+NTIO0h8+yjnVW5AMzgx9BSK3Ve5lYJ2YC9XKx2U3QQrem07+tKti+O+6vyG9FHIECgYEA4zeY0eoGSCHPFexjIImX6GwWguI4TzMdj6UYo9bjU7BLQ+7vEzcc+3LQ7jUiOY+w8twZWeWM9ZJGM/i7NjzGdOIcMm7yPy62AM79L8YdxQFjIzhHvZbLsnNpmlWPdPa1YJQox1qRpGmnBW0rDqh4cH//cqHUx59spTAjJuzIRcMCgYEAlmfvw2S8DgBJVd+1J5H0UJI/+qlDfSyczoNxqsT5SwETzfQCholCsrBpn9/dyf/R+Ua1JmoY6Q/SkgjmgszTXYZLG4Gd1PJOLcNZxYlVCTiFdqeE7BA55OwuBe0ivfdTfpVmw6BVU3D8GCDeuAb8kx40UFfaM/lYuCYyb7SILEECgYBW5MEtrejfFwbiJHe4TsZoXUWyoh7UswCgGYw1xA1FyQrPnQWS/KW5x6v9HRbMmpYaGnAbf/0LQPhWEc5OrKlcs8gCxYkg/pUd9ArBhWuHFsO6CWDuMUgPI7IEEqp9GYg9ugtqScme7cSw/5HS1jzRETI4vYjpGp/rAGDBFxZ0DwKBgD44sU+8FLAWHkCQU3kTQGc0mZMxAuJ92kD0z8k9w4Pr5i2FjKXrktQpdwjUrAQs+MiPH9HMgpGoIgyX8gSah7ZhICE49fpqYz07W6AEuFEgONZlZu/hppG1wzRgbcb40mnDlMfJRINIcoHo1zp6aXLTRAEY1wQ5WyKTarobjVoBAoGACDuq3jCOaYKoimt54H9msliQqjg9GUc35tCb4tuC7aZ2JaqG1RvCgRPS8JK92W++I1hOqBe35OLauq8cDLezoAw7uVQ/lzgBP/I5MoBXRbExtftoo2+cFT4dBQakPW1LP+p+eWCaV2C5txwWGA/d57i0X1Ax44hsX0AV/2PK7vk=",
		
		//异步通知地址
		'notify_url' => "http://localhost/alipay/notify_url.php",
		
		//同步跳转
		'return_url' => "http://localhost/alipay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
);