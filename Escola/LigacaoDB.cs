using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Policy;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using Dapper;

namespace Escola
{
    internal class LigacaoDB
    {
        /// <summary>
        /// Endereço do servidor.
        /// </summary>
        public static string Servidor { get; private set; } = "127.0.0.1";
        /// <summary>
        /// Nome do utilizador.
        /// </summary>
        public static string Utilizador { get; private set; } = "root";
        /// <summary>
        /// Password do utilizador.
        /// </summary>
        public static string Password { get; private set; } = string.Empty;
        /// <summary>
        /// Base de dados a utilizar.
        /// </summary>
        public static string DB { get; private set; } = "escola";
        /// <summary>
        /// Obter a string de ligação (connection string) ao servidor de base de dados.
        /// </summary>
        public static string GetConnectionString()
        {
            return
            $"Server={Servidor};database={DB};Uid={Utilizador};Pwd={Password};Charset=utf8mb4;Port = 3306; SslMode = none";
        }
    }
}
