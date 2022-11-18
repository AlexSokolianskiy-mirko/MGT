## MGT test tasm
TokenSeeder will create tokens with tags for dummy data
## example routes usage:
- [GET] {{host}}/api/tokens?filter[name]=test&filter[tag][0]=Yvonne Reichert&filter[tag][1]=Manley Reynolds&page
- [POST] {{host}}/api/points/allowed
    BODY
    {
        point[1][ltd]:49.79770462726677
        point[1][lng]:24.0044030896682
        point[2][ltd]:24.0044030896682
        point[2][lng]:49.79770462726677
    }
- [GET] {{host}}/api/token/neighbor?lng=44.004&ltd=44.004