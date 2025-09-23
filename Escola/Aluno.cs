using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Escola
{
    /// <summary>
    /// Representa um aluno.
    /// </summary>
    internal class Aluno
    {
        public int ID { get; set; }
        public int NumeroProcesso { get; set; }
        public int Numero { get; set; }
        public string Nome { get; set; }
        public string Morada { get; set; }
        public string CodigoPostal { get; set; }
        public string Email { get; set; }
        public DateTime DataNascimento { get; set; }
    }
}
